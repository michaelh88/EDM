<?php

defined('SYSPATH') or die('No direct script access.');

final class Controller_Import extends Controller_Website {

    public $tb_file_list = array();
    public $tb_duplicated_file = array();
    public $idx_file = 0;
    public $tb_document = array();
    public $tb_result = array();
    public $id_projet = -1;
    public $id_lot = "";
    public $nom_lot = "";
    public $nom_zip_import = "";
    public $error_msg = "";
    public $nom_fichier_zip_import = "";

    private function init_tb() {
        $this->tb_file_list = array();
        $this->tb_duplicated_file = array();
        $this->error_msg = "";
        $this->tb_result = array(
            "doublon" => 0,
            "nom_original_zip" => "",
            "nom_zip" => "",
            "nom_zip_temporaire" => "",
            "nombre_documents" => 0
        );
    }

    public function action_import() {
        $cur_role = $this->current_user_role;
        $this->template->content = View::factory('contents/Import/show');
        $this->template->jslib[] = 'jquery.ui.widget';
        $this->template->jslib[] = 'jquery.fileupload';

        $this->template->csslib[] = 'bootstrap.min';
        $this->template->csslib[] = 'jquery.fileupload';
        $sql = "
			SELECT
				projet_id
			FROM projet_user
			WHERE user_id = " . $this->current_user->id . "
		";
        $rs_prj = DB::query(Database::SELECT, $sql)->execute()->as_array();

        if (($cur_role == "2") || ($cur_role == "4")) {
            $proj = ORM::factory("Projet")
                    ->where('projet_id', '!=', '0')
                    ->find_all()
                    ->as_array('projet_id', 'nom_projet');
        } else {
            $proj = ORM::factory("Projet")
                    ->where('projet_id', 'in', $rs_prj)
                    ->find_all()
                    ->as_array('projet_id', 'nom_projet');
        }
        $this->template->content->tb_proj = $proj;
    }

    public function action_post_etape() {
        $sql = "
			SELECT
				group_concat(projet_id separator ', ') projet_id
			FROM projet_user
			WHERE user_id = " . $this->current_user->id . "
			group by user_id
		";
        $rs_prj = DB::query(Database::SELECT, $sql)->execute()->as_array();
        $sql_etp = "
			SELECT
				p.nom_projet
				,p.datetime_creation
				,ep.delai
				,e.libelle
				,e.defaut
			FROM
				projet p
				INNER JOIN etape_projet ep
					ON p.projet_id = ep.projet_id
				INNER JOIN etape e
					ON e.etape_id = ep.etape_id
			WHERE
				p.projet_id in (" . $rs_prj[0]['projet_id'] . ")
			ORDER BY
				p.nom_projet,ep.ordre
		";
        $rs_etp = DB::query(Database::SELECT, $sql_etp)->execute()->as_array();
        echo json_encode($rs_etp);
    }

    public function action_post_upload() {
        $postData = $this->request->post();
        $this->id_projet = $this->request->param('id');

        $error_message = NULL;
        $filename = NULL;
        $this->init_tb();
        if ($this->request->method() == Request::POST) {
            if (isset($_FILES['lot'])) {
                $filename = $this->_save_import($_FILES['lot']);
            }
        }

        if (!$filename) {
            if ($this->error_msg == "") {
                $this->error_msg = "Aucun fichier défini";
            }
            echo json_encode($this->error_msg);
            return;
        }
        if ($this->error_msg == "") {
            $ret = '<hr style="margin-bottom: 5px;"/><span class="upload-success">Fichier <b>' . $this->nom_zip_import . '</b> :</span><br/><span class="upload-message"> Importation terminée avec succès, nouveau lot crée :<b>' . $this->nom_lot . '</b> dont ' . sizeof($this->tb_document) . ' fichier(s) exploitable(s) sur ' . sizeof($this->tb_file_list) . '</span>';
        } else {
            $ret = $this->error_msg;
        }
        echo json_encode($ret);
    }

    private function is_file_duplicate() {
        $ret = false;
        $this->tb_duplicated_file = array();
        foreach (array_count_values($this->tb_file_list) as $val => $c)
            if ($c > 1)
                $this->tb_duplicated_file[] = $val;
        if (sizeof($this->tb_duplicated_file) > 1) {
            $ret = true;
        }
        if (sizeof($this->tb_duplicated_file) == 1) {
            if (strtoupper($this->tb_duplicated_file[0]) == "THUMBS.DB") {
                $ret = false;
            } else {
                $ret = true;
            }
        }
        return $ret;
    }

    private function _save_import($the_file) {
        $config = Kohana::$config->load('website');
        $path_download = $config['url_lot_download'];
        $path_extract = $config['url_lot_extract'];
        $path_plat = DOCROOT . $config['url_lot_plat2'];
        $path_temp = $config['url_lot_temp'];

        $doublon = 0;
        $nom_zip = "";
        $nom_zip_temporaire = "";
        $nombre_documents = 0;
        $this->nom_fichier_zip_import = $the_file["name"];
        try {
            if (
                    !Upload::valid($the_file)) {
                $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Le fichier importé n\'est pas valide.</span>';
                $this->error_msg = $sms;
                return FALSE;
            }

            if (!Upload::not_empty($the_file)) {
                $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Le fichier importé est vide.</span>';
                $this->error_msg = $sms;
                return FALSE;
            }

            if (!Upload::type($the_file, array('zip'))) {
                $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Le fichier importé n\'est pas un zip.</span>';
                $this->error_msg = $sms;
                return FALSE;
            }

            $directory_temp = $path_temp;
            $dire = strtolower(Text::random('alnum', 20));
            $directory_temp .=$dire . "/";
            if (!file_exists($directory_temp)) {
                mkdir($directory_temp, 0777, true);
            }

            if ($file = Upload::save($the_file, NULL, $directory_temp)) {

                $this->extract_zip($file, $dire);
                if ($this->error_msg != "") {
                    return false;
                }

                $directory_extract = $path_extract . $dire;
                $directory_plat = $path_plat . $dire;
                if (!file_exists($directory_plat)) {
                    mkdir($directory_plat, 0777, true);
                }

                $directory_down = $path_download . $dire;
                if (!file_exists($directory_down)) {
                    mkdir($directory_down, 0777, true);
                }

                $this->recurse_copy($directory_extract, $directory_plat);
                if (!($this->is_file_duplicate())) {
                    $this->clear_directory_temp($directory_plat);
                    $this->convert_image_directory_temp($directory_plat);
                    $this->create_zip($directory_plat, $directory_down, $dire);
                    $nom_zip_temporaire = $dire;
                    $nombre_documents = sizeof($this->tb_document);
                    if ($nombre_documents > 0) {
                        $new_lot = ORM::factory('Lot');
                        $new_lot->createur_lot = $this->current_user->id;
                        $new_lot->nom_zip_original = $the_file["name"];
                        $new_lot->commande_vivetic = 'commande_vide';
                        $new_lot->nom_zip = $nom_zip_temporaire;
                        $new_lot->nom_zip_temp = $nom_zip_temporaire;
                        $new_lot->projet_id = $this->id_projet;

                        $new_lot->nombre_doc = $nombre_documents;
                        $new_lot->save();
                        $sql_update = "update lot set nom_zip =CONCAT_WS('_',LPAD(projet_id,4,0),DATE_FORMAT(datetime_creation,'%Y%m%d'),LPAD(RIGHT(lot_id,3),6,0)) where nom_zip='" . $nom_zip_temporaire . "'";
                        DB::query(Database::UPDATE, $sql_update)->execute();
                        $inserted_lot = ORM::factory('Lot', $new_lot->lot_id);
                        $this->nom_lot = $inserted_lot->nom_zip;
                        $this->nom_zip_import = $inserted_lot->nom_zip_original;
                    } else {
                        $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Aucune image trouvée dans le lot.</span>';
                        $this->error_msg = $sms;
                    }
                } else {
                    $doublon = sizeof($this->tb_duplicated_file);
                    $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Nom de fichier identique trouvé dans le fichier importé, merci de corriger.</span>';
                    $this->error_msg = $sms;
                }
                $this->tb_result = array(
                    "doublon" => $doublon,
                    "nom_original_zip" => $the_file["name"],
                    "nom_zip" => $nom_zip,
                    "nom_zip_temporaire" => $nom_zip_temporaire,
                    "nombre_documents" => $nombre_documents
                );
                return $file;
            } else {
                $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Problème lors de l\'enregistrement du fichier.</span>';
                $this->error_msg = $sms;
            }
        } catch (Exception $exc) {
            $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Erreur au niveau du serveur.</span>';
            $this->error_msg = $sms . ' ' . $exc->getMessage();
        }
        return FALSE;
    }

    private function extract_zip($archive, $nextdir) {
        $config = Kohana::$config->load('website');
        $path_download = $config['url_lot_download'];
        $path_extract = $config['url_lot_extract'];
        $path_plat = $config['url_lot_plat'];
        $path_temp = $config['url_lot_temp'];

        if (!class_exists('ZipArchive')) {
            $status = 'Erreur, zip non supporté';
            return false;
        }
        $directory_extraction = $path_extract . $nextdir;
        if (!file_exists($directory_extraction)) {
            mkdir($directory_extraction, 0777, true);
        }
        $zip = new ZipArchive;
        if ($zip->open($archive) === TRUE) {
            if (is_writeable($directory_extraction . '/')) {
                $zip->extractTo($directory_extraction);
                $zip->close();
            } else {
                $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $this->nom_fichier_zip_import . '</b> :</span><br/><span class="upload-message">Erreur, dossier non accessible.</span>';
                $this->error_msg = $sms;
            }
        } else {

            $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $this->nom_fichier_zip_import . '</b> :</span><br/><span class="upload-message">Erreur, fichier zip non lisible.</span>';
            $this->error_msg = $sms;
            return false;
        }
    }

    private function recurse_copy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst);
                } else {
                    $this->tb_file_list[] = $file;
                    $this->idx_file+=1;
                    $namesave = sprintf("%'.08d", $this->idx_file) . "." . pathinfo($file, PATHINFO_EXTENSION);
                    $tempFileName = $this->cleanImageName($file);
                    copy($src . '/' . $file, $dst . '/' . $tempFileName);
                }
            }
        }
        closedir($dir);
    }

    private function cleanImageName($string) {
        $tempFileName = explode('.', $string);
        $name = "";
        for ($i = 0; $i < count($tempFileName) - 1; $i++) {
            $name .= $tempFileName[$i];
        }
        $string = str_replace(' ', '-', $name);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        $string = preg_replace('/-+/', '-', $string);
        return $string . '.' . $tempFileName[count($tempFileName) - 1];
    }

    private function clear_directory_temp($src) {
        $ext_ok = array("pdf", "tif", "jpg", "png");
        $dir = opendir($src);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $sext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (!(in_array($sext, $ext_ok))) {
                    unlink($src . "/" . $file);
                }
            }
        }
        closedir($dir);
    }

    private function create_zip($src, $dst, $zipname) {
        $dir = opendir($src);
        $myzip = new ZipArchive();
        $myzip->open($dst . "/" . $zipname . ".zip", ZIPARCHIVE::CREATE);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $sext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if ($sext == "pdf") {
                    $this->tb_document[] = $file;
                    $myzip->addFile($src . "/" . $file, $file);
                }
            }
        }
        closedir($dir);
        $myzip->close();
    }

    private function convert_image_directory_temp($src) {
        $ext_ok = array("tif", "jpg", "png");
        $dir = opendir($src);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $sfilesave = strtolower(pathinfo($file, PATHINFO_FILENAME));
                $sext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($sext, $ext_ok)) {
                    $this->do_convert($src . "/" . $file, $src . "/" . $sfilesave . ".pdf");
                }
            }
        }
        closedir($dir);
    }

    private function do_convert($image, $directory_plati) {
        $output = null;
        $return_var = 0;
        $command = "/usr/bin/convert -quality 60 " . $image . " " . $directory_plati;
        $ret_com = exec($command, $output, $return_var);
        if ($return_var != 0) {
            throw new Exception("Une erreur est survenue lors de la conversion de l'image en PDF");
        }
    }

    public function action_ajax_browse() {
        $role_act = $this->current_user_role;

        $arr_grp = array('nom_zip_temp', 'nom_zip', 'nom_zip_original', 'commande_vivetic');
        if (DataTables::is_request()) {

            if (($role_act == "2") || ($role_act == "4")) {
                $list_lot = DB::select(
                                'nom_zip_temp', 'nom_zip', 'nom_zip_original', 'commande_vivetic'
                        )
                        ->from('lot')
                        ->join('projet_user')
                        ->on('lot.projet_id', '=', 'projet_user.projet_id')
                        ->where('projet_user.user_id', '!=', '-1')
                        ->where('lot.termine', '=', '0')
                        ->distinct(true)
                ;
            } else {
                $list_lot = DB::select(
                                'nom_zip_temp', 'nom_zip', 'nom_zip_original', 'commande_vivetic'
                        )
                        ->from('lot')
                        ->join('projet_user')
                        ->on('lot.projet_id', '=', 'projet_user.projet_id')
                        ->where('projet_user.user_id', '=', $this->current_user->id)
                        ->where('lot.termine', '=', '0');
            }
            $paginate = Paginate::factory($list_lot)
                    ->columns(array(
                'nom_zip_temp',
                'nom_zip',
                'nom_zip_original',
                'commande_vivetic',
                    ));

            $datatables = DataTables::factory($paginate)->execute();


            foreach ($datatables->result() as $cnt) {


                $datatables->add_row(array(
                    $cnt['nom_zip_temp'],
                    $cnt['nom_zip'],
                    $cnt['nom_zip_original'],
                    $cnt['commande_vivetic']
                ));
            }

            $this->response->body($datatables->render());
        }
        else
            throw new HTTP_Exception_500();
    }

    final public function action_list() {
        $this->template->content = View::factory('contents/import/list');

        $this->template->jslib[] = 'jquery.dataTables.min';
        $this->template->jslib[] = 'ColVis.min';
        $this->template->jslib[] = 'jquery.bpopup-0.7.0.min';
        $this->template->jslib[] = 'dataTables.scroller.min';
        $this->template->jslib[] = 'itpoverlay';
        $this->template->jslib[] = 'mootools-yui-compressed';

        $this->template->csslib[] = 'itpoverlay/style';
        $this->template->csslib[] = 'jui-themes/smoothness/jquery-ui-1.8.23.custom';
        $this->template->csslib[] = 'jquery.dataTables';
        $this->template->csslib[] = 'jquery.dataTables_themeroller';
        $this->template->csslib[] = 'ColVis';
        $this->template->csslib[] = 'dataTables.scroller';

        $this->template->jslib[] = 'jquery.ui.widget';
        $this->template->jslib[] = 'jquery.fileupload';

        $this->template->csslib[] = 'bootstrap.min';
        $this->template->csslib[] = 'jquery.fileupload';
    }

    private function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir")
                        $this->rrmdir($dir . "/" . $object); else
                        unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    final public function action_del() {
        $config = Kohana::$config->load('website');
        $path_download = $config['url_lot_download'];
        $path_extract = $config['url_lot_extract'];
        $path_plat = $config['url_lot_plat'];
        $path_temp = $config['url_lot_temp'];
        $to_del = $path_download . "ghxeipymtntisnamey6v";
        $this->rrmdir($to_del);
        $to_del = $path_extract . "ghxeipymtntisnamey6v";
        $this->rrmdir($to_del);
        $to_del = $path_plat . "ghxeipymtntisnamey6v";
        $this->rrmdir($to_del);
        $to_del = $path_temp . "ghxeipymtntisnamey6v";
        $this->rrmdir($to_del);
        echo $to_del;
        $this->rrmdir($to_del);
    }

    private function del_tree() {
        $config = Kohana::$config->load('website');
        $path_download = $config['url_lot_download'];
        $path_extract = $config['url_lot_extract'];
        $path_plat = $config['url_lot_plat'];
        $path_temp = $config['url_lot_temp'];
        $to_del = $path_download . $this->id_lot;
        $this->rrmdir($to_del);
        $to_del = $path_extract . $this->id_lot;
        $this->rrmdir($to_del);
        $to_del = $path_plat . $this->id_lot;
        $this->rrmdir($to_del);
        $to_del = $path_temp . $this->id_lot;
        $this->rrmdir($to_del);
    }

    public function action_post_update_upload() {
        $postData = $this->request->post();

        $nom_temp = "";

        $le_lot = ORM::factory('Lot', $this->request->param('id'));
        if ($le_lot->loaded()) {
            $nom_temp = $le_lot->nom_zip_temp;
        }

        if ($nom_temp == "") {
            $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $_FILES['lot']["name"] . '</b> :</span><br/><span class="upload-message">Le lot choisi n\'est pas un lot valide</span>';
            $this->error_msg = $sms;
            echo json_encode($sms);
            return FALSE;
        }
        $this->id_lot = $nom_temp;

        $error_message = NULL;
        $filename = NULL;
        $this->init_tb();
        if ($this->request->method() == Request::POST) {
            if (isset($_FILES['lot'])) {
                $this->del_tree();
                $filename = $this->_update_import($_FILES['lot']);
            }
        }

        if (!$filename) {
            if ($this->error_msg == "") {
                $this->error_msg = "Aucun fichier défini";
            }
            echo json_encode($this->error_msg);
            return;
        }
        if ($this->error_msg == "") {
            $ret = '<hr style="margin-bottom: 5px;"/><span class="upload-success">Fichier <b>' . $this->nom_zip_import . '</b> :</span><br/><span class="upload-message"> Importation terminée avec succès, nouveau lot crée :<b>' . $this->nom_lot . '</b> dont ' . sizeof($this->tb_document) . ' fichier(s) exploitable(s) sur ' . sizeof($this->tb_file_list) . '</span>';
        } else {
            $ret = $this->error_msg;
        }
        echo json_encode($ret);
    }

    private function _update_import($the_file) {
        $config = Kohana::$config->load('website');
        $path_download = $config['url_lot_download'];
        $path_extract = $config['url_lot_extract'];
        $path_plat = DOCROOT . $config['url_lot_plat2'];
        $path_temp = $config['url_lot_temp'];

        $doublon = 0;
        $nom_zip = "";
        $nom_zip_temporaire = "";
        $nombre_documents = 0;
        $this->nom_fichier_zip_import = $the_file["name"];
        try {
            if (
                    !Upload::valid($the_file)) {
                return FALSE;
            }

            if (!Upload::not_empty($the_file)) {
                return FALSE;
            }

            if (!Upload::type($the_file, array('zip', 'rar'))) {
                return FALSE;
            }

            $directory_temp = $path_temp;
            $dire = $this->id_lot;
            $directory_temp .=$dire . "/";

            if (!file_exists($directory_temp)) {
                mkdir($directory_temp, 0777, true);
            }

            if ($file = Upload::save($the_file, NULL, $directory_temp)) {

                $this->extract_zip($file, $dire);
                if ($this->error_msg != "") {
                    return false;
                }
                $directory_extract = $path_extract . $dire;
                $directory_plat = $path_plat . $dire;
                if (!file_exists($directory_plat)) {
                    mkdir($directory_plat, 0777, true);
                }

                $directory_down = $path_download . $dire;
                if (!file_exists($directory_down)) {
                    mkdir($directory_down, 0777, true);
                }

                $this->recurse_copy($directory_extract, $directory_plat);
                if (!($this->is_file_duplicate())) {
                    $this->clear_directory_temp($directory_plat);
                    $this->convert_image_directory_temp($directory_plat);
                    $this->create_zip($directory_plat, $directory_down, $dire);
                    $nom_zip_temporaire = $dire;
                    $nombre_documents = sizeof($this->tb_document);
                    if ($nombre_documents > 0) {
                        $new_lot = ORM::factory('Lot')
                                ->where('nom_zip_temp', '=', $this->id_lot)
                                ->find();
                        $new_lot->createur_lot = $this->current_user->id;
                        $new_lot->nom_zip_original = $the_file["name"];
                        $new_lot->commande_vivetic = 'commande_vide';
                        $new_lot->nom_zip_temp = $nom_zip_temporaire;

                        $new_lot->nombre_doc = $nombre_documents;
                        $new_lot->save();
                        $this->nom_lot = $new_lot->nom_zip;
                        $this->nom_zip_import = $the_file["name"];
                    } else {
                        $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Aucune image trouvée dans le lot</span>';
                        $this->error_msg = $sms;
                    }
                } else {
                    $doublon = sizeof($this->tb_duplicated_file);
                    $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Nom de fichier identique trouvé dans le fichier importé, merci de corriger.</span>';
                    $this->error_msg = $sms;
                }
                $this->tb_result = array(
                    "doublon" => $doublon,
                    "nom_original_zip" => $the_file["name"],
                    "nom_zip" => $nom_zip,
                    "nom_zip_temporaire" => $nom_zip_temporaire,
                    "nombre_documents" => $nombre_documents
                );
                return $file;
            }
        } catch (Exception $exc) {
            $sms = '<hr style="margin-bottom: 5px;"/><span class="upload-fail">Fichier <b>' . $the_file["name"] . '</b> :</span><br/><span class="upload-message">Erreur au niveau du serveur.</span>';
            $this->error_msg = $sms . ' 2' . $exc->getMessage();
        }
        return FALSE;
    }

}