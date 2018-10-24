<?php

defined('SYSPATH') or die('No direct script access.');

final class Controller_Lot extends Controller_Website {
	
    final public function action_info() {
        
    }

    final public function action_list() {
        try {
            $mu_id = $this->request->param('id');
            $role_act = $this->current_user_role;
            /*
              $role_act = 2 -> administrateur vivetic
              $role_act = 4 -> administrateur fthm
              les droits changent suivant le role de l'utilisateur
             */
            if ($role_act) {

                $this->template->content = View::factory('contents/Lot/list');
                $this->template->content->current_user_role = $role_act;

                $this->template->jslib[] = 'moment';
                $this->template->jslib[] = 'jquery.daterangepicker';
                $this->template->jslib[] = 'jquery.dataTables.min';
                $this->template->jslib[] = 'ColVis.min';
				$this->template->jslib[] = 'TableTools';
				$this->template->jslib[] = 'ZeroClipboard';
                $this->template->jslib[] = 'jquery.bpopup-0.7.0.min';
                $this->template->jslib[] = 'dataTables.scroller.min';
                $this->template->jslib[] = 'itpoverlay';
                $this->template->jslib[] = 'mootools-yui-compressed';
				
				$this->template->jslib[] = 'plupload.full.min';
				$this->template->jslib[] = 'jquery.ui.plupload';
				$this->template->jslib[] = 'fr';

                $this->template->csslib[] = 'itpoverlay/style';
                $this->template->csslib[] = 'jui-themes/smoothness/jquery-ui-1.8.23.custom';
                $this->template->csslib[] = 'jquery.dataTables';
                $this->template->csslib[] = 'jquery.dataTables_themeroller';
                $this->template->csslib[] = 'ColVis';
                $this->template->csslib[] = 'dataTables.scroller';
                $this->template->csslib[] = 'daterangepicker';
				
				$this->template->csslib[] = 'jquery.ui.plupload';
				$this->template->csslib[] = 'jquery-ui';	

                // $this->template->jslib[] = 'jquery.ui.widget';
                // $this->template->jslib[] = 'jquery.fileupload';

                // $this->template->csslib[] = 'bootstrap.min';
                // $this->template->csslib[] = 'jquery.fileupload';

                $this->template->content->role =
                        ORM::factory('Role')
                        ->where('name', '!=', 'login')
                        ->find_all()
                        ->as_array('id', 'description');
                if (empty($mu_id)) {
                    $mu_id = 0;
                }
                $this->template->content->mu_id = $mu_id;
                //cas non operateur vivetic et non client
                if ($role_act != "3" && $role_act != "5" && $role_act != "6") {
                    $this->template->content->data_projet =
                            ORM::factory('Projet')
							->where('projet_id', '!=', 0)
                            ->find_all()
                            ->as_array('projet_id', 'nom_projet');
                    $orm = ORM::factory('Lot')
                            ->where('termine', 'IN', array(0, 1))
                            ->find_all();
                    $orm_order_nom_zip_original = ORM::factory('Lot')
                            ->where('termine', 'IN', array(0, 1))
                            ->order_by('nom_zip_original', 'asc')
                            ->find_all();
                    $this->template->content->data_commande_vivetic = $orm->as_array('commande_vivetic', 'commande_vivetic');
                    $this->template->content->data_lot = $orm->as_array('lot_id', 'nom_zip');
                    $this->template->content->data_nom_zip = $orm_order_nom_zip_original->as_array('lot_id', 'nom_zip_original');
                    $this->template->content->data_role_act = $role_act;
                }

                //client fthm
                elseif ($role_act == "3" || $role_act == "5" || $role_act == "6") {
                    //les projets par client
                    $sql = 'SELECT distinct(projet_id) FROM projet_user
                            WHERE user_id =' . $this->current_user->id;
                    $projet = DB::query(Database::SELECT, $sql)->execute()->as_array();

                    $this->template->content->data_projet =
                            ORM::factory('Projet')
                            ->where('projet_id', 'IN', $projet)
                            ->find_all()
                            ->as_array('projet_id', 'nom_projet');

                    $orm = ORM::factory('Lot')
                            ->where('projet_id', 'IN', $projet)
                            ->where('termine', 'IN', array(0, 1))
                            ->find_all();
                    $this->template->content->data_commande_vivetic = $orm->as_array('commande_vivetic', 'commande_vivetic');
                    $this->template->content->data_lot = $orm->as_array('lot_id', 'nom_zip');
                    $this->template->content->data_nom_zip = $orm->as_array('lot_id', 'nom_zip_original');
                    $this->template->content->data_role_act = $role_act;
                }
            } else {
                $this->template->content = Kohana::message('misc', 'role.error_create');
            }
        } catch (Exception $exc) {
            Kohana::$log->add(LOG::ERROR, $exc->getMessage());
            $this->template->preJSAction = 'alert("' . Kohana::message('misc', 'misc.error') . $exc->getMessage() . '");';
        }
    }

    final public function action_export_statistique() {
        $id_user = $this->current_user->id;
        try {
            $role_act = $this->current_user_role;
            /*
              $role_act = 2 -> administrateur vivetic
              $role_act = 4 -> administrateur fthm
              les droits changent suivant le role de l'utilisateur
             */
            if ($role_act) {

                $this->template->content = View::factory('contents/Lot/export');
                $this->template->content->current_user_role = $role_act;

                $this->template->jslib[] = 'moment';
                $this->template->jslib[] = 'jquery.daterangepicker';
                $this->template->jslib[] = 'jquery.bpopup-0.7.0.min';
                $this->template->jslib[] = 'itpoverlay';
                $this->template->jslib[] = 'mootools-yui-compressed';

                $this->template->csslib[] = 'itpoverlay/style';
                $this->template->csslib[] = 'daterangepicker';

                $this->template->content->role =
                        ORM::factory('Role')
                        ->where('name', '!=', 'login')
                        ->find_all()
                        ->as_array('id', 'description');
                $this->template->content->id_user = $id_user;
                //cas non operateur vivetic et non client
                if ($role_act != "3" && $role_act != "5" && $role_act != "6") {
                    $this->template->content->data_projet =
                            ORM::factory('Projet')
                            ->where('projet_id', '!=', 0)
                            ->find_all()
                            ->as_array('projet_id', 'nom_projet');

                    $this->template->content->data_granularite = array(0 => 'Hebdomadaire', 1 => 'Mensuel', 2 => 'Quotidien');
                } elseif ($role_act == "3" || $role_act == "5" || $role_act == "6") {
                    //les projets par client
                    $sql = 'SELECT distinct(projet_id) FROM projet_user
                            WHERE user_id =' . $this->current_user->id;
                    $projet = DB::query(Database::SELECT, $sql)->execute()->as_array();

                    $this->template->content->data_projet =
                            ORM::factory('Projet')
                            ->where('projet_id', 'IN', $projet)
                            ->find_all()
                            ->as_array('projet_id', 'nom_projet');
                    $this->template->content->data_granularite = array(0 => 'Hebdomadaire', 1 => 'Mensuel', 2 => 'Quotidien');
                }
            } else {
                $this->template->content = Kohana::message('misc', 'role.error_create');
            }
        } catch (Exception $exc) {
            Kohana::$log->add(LOG::ERROR, $exc->getMessage());
            $this->template->preJSAction = 'alert("' . Kohana::message('misc', 'misc.error') . $exc->getMessage() . '");';
        }
    }

    final public function action_ajax_browse() {
        $role_act = $this->current_user_role;
        $url = URL::site('/public/img');
        /* formatage date */
        $clTzSec = Session::instance()->get('clTzSec');
        		$iDisplayStart=1;$iDisplayLength = 15;		
		$origin_dtz = new DateTimeZone('Europe/Paris');
		// $origin_dtz = new DateTimeZone('Indian/Antananarivo');
		$origin_dt = new DateTime("now", $origin_dtz);
		$svTzSec = $origin_dtz->getOffset($origin_dt);
		$Interval = $clTzSec - $svTzSec;
		
		$clTzSecDI = DateInterval::createFromDateString($Interval . ' seconds');
        $utcTz = new DateTimezone('UTC');
        /* formatage date fin */
        $where = '';
        if ($role_act) {
            // //cas operateur vivetic
            // if ($role_act == "3") {
            // $where = " and ISNULL(datetime_validation) = 0 ";
            // }
            //client fthm
            // else
            if ($role_act == "6" || $role_act == "5" || $role_act == "3") {
                $sql = 'SELECT distinct(projet_id) FROM projet_user
                            WHERE user_id  =' . $this->current_user->id;

                $projet = DB::query(Database::SELECT, $sql)->execute();
                $idin = '';
                foreach ($projet as $p) {
                    $idin.= $p["projet_id"] . ',';
                }
                $where = " AND lot.projet_id IN (" . substr($idin, 0, strlen($idin) - 1) . ") ";
            }

            if ($_REQUEST) {

                if ($role_act) {
                    if (isset($_REQUEST["iDisplayLength"]) && isset($_REQUEST["iDisplayStart"])) {
                        $iDisplayStart = $_REQUEST["iDisplayStart"];
                        $iDisplayLength = $_REQUEST["iDisplayLength"];
                    }
                    /*
                     * Filtering
                     */
                    $mwFiltre = $this->makeWhereFiltre($_REQUEST);
                    /*
                     * Ordering
                     */
                    $aColumns = array('lot_id',
                        'nom_projet',
                        'commande_vivetic',
                        'datetime_creation',
                        'nombre_doc',
                        'nom_zip_original',
                        'etat',
                        'nom_zip',
                        'createur_lot',
                        'datetime_modification',
                        'modificateur_lot',
                        'datetime_validation',
                        'volume_piece',
                        'avancement_globale',
                        'nb_notif',
                        'duree_traitement',
                        '');
                    if (isset($_REQUEST['iSortCol_0'])) {
                        $sOrder = "ORDER BY  ";
                        for ($i = 0; $i < intval($_REQUEST['iSortingCols']); $i++) {

                            if (intval($_REQUEST['iSortCol_' . $i]) == 14) {
                                $sOrder .= ' nb_notif  '
                                        . mysqli_real_escape_string(Database_MySQLi::$_last_connection_handle, $_REQUEST['sSortDir_' . $i]) . ',nb_total_lot  '
                                        . mysqli_real_escape_string(Database_MySQLi::$_last_connection_handle, $_REQUEST['sSortDir_' . $i]) . '  ';
                            } elseif ($_REQUEST['bSortable_' . intval($_REQUEST['iSortCol_' . $i])] == "true") {
                                $sOrder .= $aColumns[intval($_REQUEST['iSortCol_' . $i])] . " "
                                        . mysqli_real_escape_string(Database_MySQLi::$_last_connection_handle, $_REQUEST['sSortDir_' . $i]) . ", ";
                            }
                        }

                        $sOrder = substr_replace($sOrder, "", -2);
                        if ($sOrder == "ORDER BY") {
                            $sOrder = "";
                        }
                    }
                    /*
                     * fin Ordering
                     */
                    /*
                     * debut requete pour la liste des lots
                     */
                    $req = 'SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = ' . $this->current_user->id . '																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = ' . $this->current_user->id . '																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1 ' . $where . $mwFiltre . 'AND termine IN (0,1)' . $sOrder;
                    $req_return = $req . ' LIMIT ' . $iDisplayStart . ',' . $iDisplayLength;
                    $lot = DB::query(Database::SELECT, $req_return)->execute();
                    $reqTotal = 'SELECT COUNT(*) as nb,SUM(avancement_globale) as somme FROM (' . $req . ') al';
                    $countLot = DB::query(Database::SELECT, $reqTotal)->execute();
                }
                /*
                 * fin requete pour la liste des lots
                 */
                /* Formation de l'array pour l'encodage en json */
                $temp = array();

                foreach ($lot as $l) {
                    $datetimecreation = null;

                    if ($l['datetime_creation'] != null) {
                        $dateCreationDT = new DateTime($l['datetime_creation'], $utcTz);
                        $datetimecreation = $dateCreationDT;
                        $dateCreationDT->add($clTzSecDI);
                        $l['datetime_creation'] = $dateCreationDT->format('d/m/Y H:i:s');
                    }
                    if ($l['datetime_modification'] != null) {
                        $dateCreationDT = new DateTime($l['datetime_modification'], $utcTz);
                        $dateCreationDT->add($clTzSecDI);
                        $l['datetime_modification'] = $dateCreationDT->format('d/m/Y H:i:s');
                    }
                    if ($l['datetime_validation'] != null) {
                        $dateCreationDT = new DateTime($l['datetime_validation'], $utcTz);
                        $dateCreationDT->add($clTzSecDI);
                        $l['datetime_validation'] = $dateCreationDT->format('d/m/Y H:i:s');
                    }
					
					if ($l["etat"] == "Terminé") {
						$l["telechargement"] = '<a onclick="download_lot(\'' . $l["nom_zip_temp"] . '\',\'' . $l["nom_zip"] . '\');return false;"><img src="' . $url . '/telecharger.png" title="Télécharger" style="padding: 0 1px 0 1px;" /></a><img onclick="resetLotClick(\'reset_lot\')" src="' . $url . '/reset.png" title="Supprimer" style="padding: 0 1px 0 1px;"/><img src="' . $url . '/none.png" style="padding: 0 1px 0 1px;" />';
					} else {
						$l["telechargement"] = '<a onclick="download_lot(\'' . $l["nom_zip_temp"] . '\',\'' . $l["nom_zip"] . '\');return false;"><img src="' . $url . '/telecharger.png" title="Télécharger" style="padding: 0 1px 0 1px;" /></a><img onclick="resetLotClick(\'reset_lot\')" src="' . $url . '/reset.png" title="Supprimer" style="padding: 0 1px 0 1px;"/><img onclick="updateLotClick()" src="' . $url . '/edit.png" title="Modifier" style="padding: 0 1px 0 1px;" />';
					}

                    if ($l["nb_notif"] != null) {
                        $l["nb_notif"] = '<a onclick="do_click(\'notification\')" title="Notification" lot_id="' . $l["lot_id"] . '"><img src="' . $url . '/notification.png" title="Notification" style="padding: 0 3px 0 3px; position: relative; top: 2px;" /><span style="margin-top: 0px; position: relative; top: -3px;">' . $l["nb_notif"] . '/' . $l["nb_total_lot"] . '</span></a>';
                    } else {
                        $l["nb_notif"] = '<a onclick="do_click(\'notification\')" title="Notification" lot_id="' . $l["lot_id"] . '"><img src="' . $url . '/notification.png" title="Notification" style="padding: 0 3px 0 3px; position: relative; top: 2px;" /><span style="margin-top: 0px; position: relative; top: -3px;">0/' . $l["nb_total_lot"] . '</span></a>';
                    }

                    if ($l["avancement_globale"] != null) {

                        $l["avancement_globale"] = '<a onclick="do_click(\'avancement\')" title="Avancement" lot_id="' . $l["lot_id"] . '"><img src="' . $url . '/analytics.png" title="Avancement" style="padding: 0 3px 0 3px; position: relative; top: 2px;" /><span style="margin-top: 0px; position: relative; top: -3px;">' . $l["avancement_globale"] . '%</span></a>';
                    } else {
                        $l["avancement_globale"] = '<a onclick="do_click(\'avancement\')" title="Avancement" lot_id="' . $l["lot_id"] . '"><img src="' . $url . '/analytics.png" title="Avancement" style="padding: 0 3px 0 3px; position: relative; top: 2px;" /><span style="margin-top: 0px; position: relative; top: -3px;">0%</span></a>';
                    }
                    $l["avglobal"] = $l["projet_id"];
                    if ($l['duree_traitement'] != null) {
                        $array_DT = explode(':', $l['duree_traitement']);
                        $heure = intval($array_DT[0] % 24);
                        $minute = $array_DT[1];
                        $jour = intval($array_DT[0] / 24);
                        $l['duree_traitement'] = $jour . 'j ' . $heure . 'h ' . $minute . 'm ';
                    }
					if ($l["volume_piece"] == 0) {
						$l["volume_piece"] = $l["nombre_doc"];
                    } else {
                        $l["volume_piece"] = $l["volume_piece"];
                    }
                    $temp[] = $l;
                }
                /* JSON encode */
                $render = json_encode(array
                    (
                    'sEcho' => intval($_REQUEST["sEcho"]),
                    'iTotalRecords' => intval($countLot[0]["nb"]),
                    'aaData' => $temp
                        ));
                $this->response->body($render);
            }
            else
                throw new HTTP_Exception_500();
        }
    }

    /*
     * click sur un lot, recuperation des données necessaires pour l'affichage
     */

    final public function action_ajax_get_data() {
        $role_act = $this->current_user_role;
        $id_user = $this->current_user->id;
        try {
            if ($_REQUEST) {
                $lot_id = $_REQUEST['lot_id'];
                $projet_id = $_REQUEST['projet_id'];
                if ($role_act && $lot_id && $projet_id != NULL) {
                    $data = array();
                    //recuperation des users
                    if ($role_act == '6') {
                        $query = '
									SELECT
										t1.*
									FROM
										(SELECT 	DISTINCT(id),
												userlastname,
												userfirstname
										FROM users
										JOIN projet_user
										ON projet_user.user_id = users.id
										WHERE projet_user.projet_id IN (0,' . $projet_id . ')
										AND projet_user.user_id != ' . $id_user . ' ) t1
									INNER JOIN
										(SELECT
											user_id, role_id
										FROM
											roles_users
										WHERE
											role_id != 2 AND role_id != 3 AND role_id != 1 ) t2
									ON t1.id = t2.user_id
									ORDER BY id';
                    } else {
                        $query = '	SELECT 	DISTINCT(id),
										userlastname,
										userfirstname
								FROM users JOIN projet_user ON projet_user.user_id = users.id
								WHERE projet_user.projet_id IN (0,' . $projet_id . ') AND projet_user.user_id != ' . $id_user;
                    }
                    $data_user = DB::query(Database::SELECT, $query)->execute()->as_array();
                    $data['users'] = $data_user;

                    $this->response->body(json_encode($data));
                }
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }

    /*
     * click sur un/+ieurs projet du filtre
     */

    final public function action_ajax_get_lot() {

        if (HTTP_Request::POST == $this->request->method()) {
            $postData = $this->request->post();
            $projet_id = $postData['projet_id'];
            //$cur_us = $this->current_user;
            try {
                $where = '';
                if ($projet_id != 'tous') {
                    $where = "WHERE projet_id in (" . $projet_id . ")";
                }

                if ($projet_id != "") {
                    $sql = "SELECT lot_id,nom_zip FROM lot " . $where . "AND termine IN (0,1)";
                    $sql2 = "SELECT lot_id, nom_zip_original FROM lot " . $where . "AND termine IN (0,1) ORDER BY nom_zip_original";
					$sql3 = "SELECT DISTINCT(commande_vivetic) commande_vivetic FROM lot " . $where . "AND termine IN (0,1) ORDER BY commande_vivetic ASC";
                    $data_projet = DB::query(Database::SELECT, $sql)->execute();
                    $data_nomzip = DB::query(Database::SELECT, $sql2)->execute();
					$data_commande_vivetic = DB::query(Database::SELECT, $sql3)->execute();
                    $return = array();
                    $return2 = array();
					$return3 = array();
                    foreach ($data_projet as $p) {
                        $return[] = $p;
                    }
                    foreach ($data_nomzip as $p) {
                        $return2[] = $p;
                    }
					foreach ($data_commande_vivetic as $p) {
                        $return3[] = $p;
                    }
                    $data = array();
                    $data['projet'] = $return;
                    $data['nomzip'] = $return2;
					$data['commande_vivetic'] = $return3;
                    $this->response->body(json_encode($data));
                }
                else
                    throw new HTTP_Exception_500();
            } catch (Exception $exc) {
                $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
            }
        }
    }

    /*
     * suppression d'un lot
     */

    final public function action_ajax_reset_lot() {
        try {
            if (HTTP_Request::POST == $this->request->method()) {
                $postData = $this->request->post();
                $isInsert = empty($postData['lot_id']);

                $lot_id = $postData['lot_id'];
                if (!$isInsert) {
                    $query = DB::update('lot')->set(array('termine' => 2))->where('lot_id', '=', $lot_id)->execute();
                    $action_utilisateur = "Suppression du lot " . $lot_id;
                    $loginfo = "[Utilisateur : " . $this->current_user->username . "] [Action : " . $action_utilisateur . "]";
                    Kohana::$log->add(LOG::INFO, $loginfo);
                }
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }

	final public function action_ajax_check_file() {
        try {
            if (HTTP_Request::POST == $this->request->method()) {
                $postData = $this->request->post();
                $isInsert = empty($postData['lot']);

                $lot_id = $postData['lot'];
				$data_dir = $postData['data'];
                if (!$isInsert) {
                    $imagesPath="../misc/download";
					$ret = 0;
					
					if (isset($postData['data']) &&  isset($postData['lot'])) {
						$urlimg = $imagesPath . "/".$postData['data']."/".$postData['lot'].".zip" ;
						if(file_exists($urlimg))
						{
							$ret = 1;
						}
					}
					$this->response->body(json_encode($ret));
                }
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }
	
    /*
     * récupération des étapes d'un lot
     */

    final public function action_ajax_get_etape_lot() {
        $id_user = $this->current_user->id;
        $role_act = $this->current_user_role;
        $caseStr = '';
        try {
            if (HTTP_Request::POST == $this->request->method()) {
                $postData = $this->request->post();
                $isInsert = empty($postData['lot_id']);
				$defaut = ',e.defaut';
                $lot_id = $postData['lot_id'];
				//operateur vivetic
				if($role_act == '3')
					$defaut = ', 0 as defaut';
				
                if ($role_act == '2' || $role_act == '4') {    // administrateur
                    $caseStr = '  1  AS display ';
                }elseif($role_act == '3' || $role_act == '5'){   //operateur vivetic et fthm
					$caseStr = 'CASE 	WHEN uep.user_etape_projet_id IS NULL THEN 0 ELSE 1 END AS display';
				}else {    // client
                    $caseStr = 'CASE 	WHEN uep.user_etape_projet_id IS NULL THEN 0
										WHEN uep.user_etape_projet_id IS NOT NULL AND e.defaut = 0 THEN 0 
										ELSE 1
								END AS display';
					$defaut = ', 0 as defaut';
                }
                if (!$isInsert) {
                    $data = array();
                    $req = '
						SELECT
							ep.etape_projet_id etape_projet_id
							,e.etape_id
							,e.libelle

							, ' . $caseStr . '
							, CASE WHEN h.historique_lot_id IS NULL THEN 0 ELSE 1 END AS historised
							, CASE WHEN h.volume_doc IS NULL THEN 0 ELSE h.volume_doc END AS volume_doc
							'.$defaut.'
						FROM
							projet p
							INNER JOIN etape_projet ep
								ON p.projet_id = ep.projet_id
							INNER JOIN etape e
								ON e.etape_id = ep.etape_id
							LEFT JOIN (
									SELECT * FROM user_etape_projet  WHERE user_id = ' . $id_user . '
								)uep
								ON uep.etape_projet_id = ep.etape_projet_id
							LEFT JOIN (
									SELECT * FROM historique_lot WHERE historique_lot_id IN

										(
										SELECT
											MAX(historique_lot_id) AS historique_lot_id

										FROM
											historique_lot


										 WHERE lot_id = ' . $lot_id . '
										GROUP BY 	etape_projet_id


										)
								) h
								ON h.etape_projet_id = ep.etape_projet_id
						WHERE
							p.projet_id = (SELECT projet_id FROM lot WHERE lot_id = ' . $lot_id . ' )

						ORDER BY
							p.nom_projet,ep.ordre';
                    $lot = DB::query(Database::SELECT, $req)->execute()->as_array();
                    $nb_doc = DB::select('nombre_doc')->from('lot')->where('lot_id', '=', $lot_id)->execute()->as_array();
                    $data['data_etape_lot'] = $lot;
                    $this->response->body(json_encode($data));
                }
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }

    /*
     * mise à  des étapes d'un lot
     */

    final public function action_ajax_update_etape() {
        try {
            if (HTTP_Request::POST == $this->request->method()) {
                $postData = $this->request->post();

                $lot_id = $postData['lot_id'];
                $data = $postData['data'];

                $query = DB::query(Database::SELECT, 'SELECT projet_id, nombre_doc FROM lot WHERE lot_id=' . $lot_id)->execute()->as_array();
                $nb_doc = $query[0]["nombre_doc"];
                $projet_id = $query[0]["projet_id"];
                for ($i = 0; $i < count($data); $i++) {
                    $arrData = explode(",", $data[$i]);
                    $EtapeProjetId = DB::query(Database::SELECT, "SELECT
																	etape_projet_id
																FROM 	etape_projet,
																	(SELECT
																		etape_id
																		FROM etape
																		WHERE libelle = '" . $arrData[0] . "') etape
																WHERE etape_projet.projet_id = " . $projet_id . "
																AND etape_projet.etape_id = etape.etape_id")->execute()->as_array();
                    $volumeDoc_avant = DB::query(Database::SELECT, "	SELECT volume_doc, datetime_debut
																	FROM historique_lot
																	WHERE lot_id = " . $lot_id . "
																	AND etape_projet_id = " . $EtapeProjetId[0]["etape_projet_id"] . "
																	ORDER BY datetime_debut DESC LIMIT 1")->execute()->as_array();
                    if (sizeof($volumeDoc_avant) == 0) {
                        $volumeDoc_avant[0]['volume_doc'] = 0;
                    }
                    $query = "	SELECT
									e.libelle
								FROM
									( SELECT
										etape_id
									FROM
										etape_projet
									WHERE projet_id = " . $projet_id . "
									AND ordre = (	SELECT
												max(ordre) ordre
											FROM
												etape_projet
											WHERE projet_id = " . $projet_id . " ) ) tb1
								INNER JOIN
									etape e
								ON e.etape_id = tb1.etape_id";
                    $reqLibelle = DB::query(Database::SELECT, $query)->execute()->as_array();

                    if ($volumeDoc_avant[0]['volume_doc'] == $nb_doc) {
                        if ($volumeDoc_avant[0]['volume_doc'] != $arrData[1]) {
                            // update supprimer date fin
                            $action_utilisateur = "Mise à jour des étapes du lot " . $lot_id;
                            $loginfo = "[Utilisateur : " . $this->current_user->username . "] [Action : " . $action_utilisateur . "]";
                            Kohana::$log->add(LOG::INFO, $loginfo);
                            DB::query(Database::INSERT, "INSERT INTO historique_lot (lot_id, etape_projet_id, datetime_debut, volume_doc, datetime_fin)
							VALUES (" . $lot_id . "," . $EtapeProjetId[0]["etape_projet_id"] . ",CURRENT_TIMESTAMP()," . $arrData[1] . ",NULL)")->execute();
                            if ($reqLibelle[0]['libelle'] == $arrData[0]) {
                                // update termine = 0 du lot
                                DB::query(Database::UPDATE, "UPDATE lot SET termine = 0 WHERE lot_id = " . $lot_id)->execute();
                            }
                        }
                    } elseif ($arrData[1] == $nb_doc) {
                        // update avec datetime fin
                        $action_utilisateur = "Mise à jour des étapes du lot " . $lot_id;
                        $loginfo = "[Utilisateur : " . $this->current_user->username . "] [Action : " . $action_utilisateur . "]";
                        Kohana::$log->add(LOG::INFO, $loginfo);
                        DB::query(Database::INSERT, "INSERT INTO historique_lot (lot_id, etape_projet_id, datetime_debut, volume_doc, datetime_fin)
							VALUES (" . $lot_id . "," . $EtapeProjetId[0]["etape_projet_id"] . ",CURRENT_TIMESTAMP()," . $arrData[1] . ",CURRENT_TIMESTAMP())")->execute();
                        $libelle = DB::select('etape.libelle')
                                ->from('etape')
                                ->join('etape_projet')
                                ->on('etape.etape_id', '=', 'etape_projet.etape_id')
                                ->where('etape_projet.projet_id', '=', $projet_id)
                                ->where('etape_projet.ordre', '=', 1)
                                ->execute()
                                ->as_array();
                        if ($libelle[0]['libelle'] == $arrData[0]) {
                            // validation fthm update lot
                            DB::query(Database::UPDATE, "UPDATE lot SET datetime_validation = CURRENT_TIMESTAMP() WHERE lot_id = " . $lot_id)->execute();
                        }

                        if ($reqLibelle[0]['libelle'] == $arrData[0]) {
                            // update termine = 1 du lot
                            DB::query(Database::UPDATE, "UPDATE lot SET termine = 1 WHERE lot_id = " . $lot_id)->execute();
                        }
                    } else {
                        // update
                        $action_utilisateur = "Mise à jour des étapes du lot " . $lot_id;
                        $loginfo = "[Utilisateur : " . $this->current_user->username . "] [Action : " . $action_utilisateur . "]";
                        Kohana::$log->add(LOG::INFO, $loginfo);
                        DB::query(Database::INSERT, "INSERT INTO historique_lot (lot_id, etape_projet_id, datetime_debut, volume_doc)
							VALUES (" . $lot_id . "," . $EtapeProjetId[0]["etape_projet_id"] . ",CURRENT_TIMESTAMP()," . $arrData[1] . ")")->execute();
                    }
                }
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }

    /*
     * Export des statistiques
     */

    final public function action_ajax_export_statistique() {
        $id_user = $this->current_user->id;
        try {
            if ($_REQUEST) {
                $projet_id = $_REQUEST['projet_id'];
                $array_id = explode("#", $projet_id);
                $date_creation = $_REQUEST['date_creation'];
                $data_granularite = $_REQUEST['data_granularite'];
                $id_file = $_REQUEST['data_id_file'];
                $mwFiltre = $this->makeWhereFiltreStat($_REQUEST);
                $select = '';
                $groupby = '';
                if ($data_granularite == 0) {
                    $nom = 'hebdomadaire';
                    $select = '	SELECT
									CONCAT("S ",numero_sem) numero_sem
									,SUM(nb_total_lot) nb_total_lot
									,SUM(nb_total_doc) nb_total_doc
									,CASE
										WHEN SUM(nb_total_lot) = 0 THEN 0
										ELSE SUM(nb_total_doc)/SUM(nb_total_lot)
									END AS nb_moyen_doc
									,SUM(nb_lot_termine) nb_lot_termine
									,TIME_FORMAT(SEC_TO_TIME(SUM(delais_traitement_moyen)),"%H:%i") delais_traitement_moyen
									,SUM(lot_en_cours) lot_en_cours
									,SUM(nb_message) nb_message
									,CASE
										WHEN SUM(nb_lot) = 0 THEN 0
										ELSE SUM(nb_message)/SUM(nb_lot)
									END AS moyenne_message
								FROM
									(';
                    $groupby = '	) tab
								GROUP BY numero_sem';
                } elseif ($data_granularite == 1) {
                    $nom = 'mensuel';
                    $select = '	SELECT
									CASE
										WHEN numero_mois = 1 THEN "Janvier"
										WHEN numero_mois = 2 THEN "Février"
										WHEN numero_mois = 3 THEN "Mars"
										WHEN numero_mois = 4 THEN "Avril"
										WHEN numero_mois = 5 THEN "Mai"
										WHEN numero_mois = 6 THEN "Juin"
										WHEN numero_mois = 7 THEN "Juillet"
										WHEN numero_mois = 8 THEN "Août"
										WHEN numero_mois = 9 THEN "Septembre"
										WHEN numero_mois = 10 THEN "Octobre"
										WHEN numero_mois = 11 THEN "Novembre"
										WHEN numero_mois = 12 THEN "Décembre"
									END AS numero_mois
									,SUM(nb_total_lot) nb_total_lot
									,SUM(nb_total_doc) nb_total_doc
									,CASE
										WHEN SUM(nb_total_lot) = 0 THEN 0
										ELSE SUM(nb_total_doc)/SUM(nb_total_lot)
									END AS nb_moyen_doc
									,SUM(nb_lot_termine) nb_lot_termine
									,TIME_FORMAT(SEC_TO_TIME(SUM(delais_traitement_moyen)),"%H:%i") delais_traitement_moyen
									,SUM(lot_en_cours) lot_en_cours
									,SUM(nb_message) nb_message
									,CASE
										WHEN SUM(nb_lot) =0 THEN 0
										ELSE SUM(nb_message)/SUM(nb_lot)
									END AS moyenne_message
								FROM
									(';
                    $groupby = '	) tab
								GROUP BY numero_mois';
                } elseif ($data_granularite == 2) {
                    $nom = 'quotidient';
                    $select = '	SELECT
									ladate
									,nb_total_lot
									,nb_total_doc
									,nb_moyen_doc
									,nb_lot_termine
									,TIME_FORMAT(SEC_TO_TIME(delais_traitement_moyen),"%H:%i") delais_traitement_moyen
									,lot_en_cours
									,nb_message
									,moyenne_message
								FROM
									(';
                    $groupby = '	) tab';
                }
                $data = array();
                foreach ($array_id as $value) {
                    $req = $this->getSqlExportStatistique($value, $mwFiltre, $select, $groupby);
                    $data_stat = DB::query(Database::SELECT, $req)->execute()->as_array();
                    $projet = DB::select('nom_projet')
                            ->from('projet')
                            ->where('projet_id', '=', $value)
                            ->execute()
                            ->as_array();
                    $data[$projet[0]['nom_projet']] = $data_stat;
                }

                $objPHPExcel = new PHPExcel();
                $tab = array();

                $index = 0;
                $name = $id_file . '_' . $id_user . 'output.xls';
                foreach ($data as $key => $value) {
                    if ($index > 0) {
                        $objPHPExcel->createSheet();
                    }
                    $objPHPExcel->setActiveSheetIndex($index);
                    $objWorkSheet = $objPHPExcel->getActiveSheet();
                    $name_sheet = $key;
                    $arrayData = $value;
                    for ($col = 'A'; $col !== 'ZZ'; $col++) {
                        $objWorkSheet->getColumnDimension($col)
                                ->setAutoSize(true);
                    }
                    $objWorkSheet->getDefaultStyle()
                            ->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $objWorkSheet->getStyle("A1:A9")->applyFromArray(array("font" => array("bold" => true)));
                    $objWorkSheet->setCellValue('A1', 'Indicateur\Granularité')
                            ->setCellValue('A2', 'Nombre total de lots')
                            ->setCellValue('A3', 'Nombre total de documents')
                            ->setCellValue('A4', 'Nombre moyen de documents par lot')
                            ->setCellValue('A5', 'Nombre de lots traités')
                            ->setCellValue('A6', 'Délais de traitement moyen')
                            ->setCellValue('A7', 'Nombre de lots en cours')
                            ->setCellValue('A8', 'Total de messages')
                            ->setCellValue('A9', 'Nombre moyen de messages');
                    $objWorkSheet->setTitle($name_sheet);
                    $col = 0;
                    foreach ($arrayData as $keys => $value1) {
                        $lin = 0;
                        foreach ($value1 as $keys2 => $value2) {
                            if ($keys2 == 'delais_traitement_moyen' && $value2 != '00:00') {
                                $array_DT = explode(':', $value2);
                                $heure = intval($array_DT[0] % 24);
                                $minute = $array_DT[1];
                                $jour = intval($array_DT[0] / 24);
                                $value2 = $jour . 'j ' . $heure . 'h ' . $minute . 'm ';
                            }
                            $tab[$lin][$col] = $value2;
                            $lin++;
                        }
                        $col++;
                    }
                    foreach ($tab as $key => $value) {
                        $objWorkSheet->fromArray($value, null, 'B' . ($key + 1));
                    }
                    $index++;
                }
                $url = DOCROOT . 'public/temp_file';
                $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
                $objWriter->save($url . '/' . $name);
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }

    /*
     * Anvancement global
     */

    final public function action_ajax_avancement_global() {
		$id_user = $this->current_user->id;
        $role_act = $this->current_user_role;
        $caseStr = '';
        try {
			// $role_act = $this->current_user_role;
            if ($_REQUEST) {
				$strprojet_id = '';
				if ($role_act == "3" || $role_act == "5" || $role_act == "6") {
                    //les projets par client
                    $sql = 'SELECT distinct(projet_id) FROM projet_user
                            WHERE user_id =' . $this->current_user->id;
					// echo $sql;
                    $projet = DB::query(Database::SELECT, $sql)->execute()->as_array();
					// var_dump($projet);die();
					$temp = array();
					// foreach($projet[0] as $l)
						// $temp[] = $l;
					$nb = count($projet);
					$i = 0;
					foreach($projet as $val){
						$strprojet_id .= $val["projet_id"];
						if ($i < ($nb - 1)) {
							$strprojet_id .= ',';
							$i++;
						}
					}
					$strprojet_id = ' AND projet_id IN (' . $strprojet_id . ') ';
                }
                $myFiltre = $this->makeWhereFiltreAvancement($_REQUEST,$strprojet_id);
				$myFiltreMultiID = $this->makeWhereFiltreMultiIdAvancement($_REQUEST);
                $myFiltreDate = '';
                $myFiltreEtat = '';
                if ($_REQUEST['data_datetime_creation'] != '') {
                    $myFiltreDate = $this->setAndFiltreDateAvancement($_REQUEST['data_datetime_creation'], 'datetime_creation');
                }
                if ($_REQUEST['data_etat'] != '') {
                    $myFiltreEtat = $this->setAndFiltreMultipleValueAvancement($_REQUEST['data_etat'], 'etat');
                }
				if ($role_act == '2' || $role_act == '4') {    // administrateur
                    $caseStr = '  1  AS display ';
                }elseif($role_act == '3' || $role_act == '5'){   //operateur vivetic et fthm
					$caseStr = 'CASE 	WHEN uep.user_etape_projet_id IS NULL THEN 0 ELSE 1 END AS display';
				}else {    // client
                    $caseStr = 'CASE 	WHEN uep.user_etape_projet_id IS NULL THEN 0
										WHEN uep.user_etape_projet_id IS NOT NULL AND e.defaut = 0 THEN 0 
										ELSE 1
								END AS display';
                }
                $query = "
					SELECT
						data1.projet_id,
						data1.etape_id,
						data1.libelle,
						data1.volume_pourcent,
						data1.nom_projet,
						data2.display
					FROM
					(
						SELECT
							tab2.projet_id,
							tab1.etape_id,
							tab1.libelle,
							tab1.volume_pourcent,
							tab2.nom_projet
						FROM
						(							
							
							
							SELECT
								tb5.projet_id,
								tb5.etape_id,
								ep.libelle,
								tb5.volume_pourcent
							FROM
								(SELECT
									tb3.etape_id,
									tb3.projet_id,
									(tb3.volume_total/tb4.nombre_doc)*100 volume_pourcent
								FROM
									(SELECT
										 etape_id
										 ,projet_id
										 ,SUM(volume_doc) volume_total
									FROM
										(
										 SELECT
											historique_lot_id,
											lot_id,
											l.etape_projet_id,
											datetime_debut,
											datetime_fin,
											volume_doc,
											volume_piece ,
											projet_id,
											etape_id

										FROM
											(
											SELECT
												historique_lot_id,
												lot_id,
												etape_projet_id,
												datetime_debut,
												datetime_fin,
												volume_doc,
												volume_piece
											FROM
												historique_lot hl

											WHERE hl.historique_lot_id IN (

												SELECT
													MAX(historique_lot_id)  AS max_id
												FROM
													historique_lot
												GROUP BY
												lot_id,
												etape_projet_id
												)
											ORDER BY hl.lot_id, hl.etape_projet_id
											) l
										INNER JOIN etape_projet p
										ON l.etape_projet_id = p.etape_projet_id

										WHERE 1=1  " . $myFiltreMultiID . "
										AND lot_id IN ( SELECT lot_id FROM lot WHERE 1=1  ".$myFiltre." )
									
									)tb2

									GROUP BY etape_id,projet_id
									ORDER BY projet_id, etape_id) tb3
								INNER JOIN
									(
									SELECT
										projet_id,
										SUM(nombre_doc) nombre_doc
									FROM
										(
										SELECT
											*
										FROM
											( SELECT
												l.lot_id lot_id,
												l.projet_id projet_id,
												l.nombre_doc,
												l.commande_vivetic,
												CASE
													WHEN avancement_globale IS NULL THEN 'Créer'
													WHEN avancement_globale > 0
													and termine = 1 THEN 'Terminé'
													WHEN DATE_ADD(l.datetime_creation,
													INTERVAL delai MINUTE) < datetime_debut_max
													and termine = 0 THEN 'Alerte délai'
													ELSE 'En cours'
												END as etat
											FROM
												lot l
											left join
												(
												SELECT
													l.lot_id,
													ROUND(t1.volume_doc / (t2.nombre_doc*t2.nb_etape),
													2) as avancement_globale,
													t3.delai,
													t3.datetime_debut_max
												FROM
													lot l,
													(SELECT
														lot_id,
														sum(volume_doc) volume_doc
													FROM
														(SELECT
															hl.lot_id,
															max(hl.volume_doc)*100 as volume_doc,
															ep.etape_id
														FROM
															historique_lot hl ,
															etape_projet ep,
															lot l
														WHERE
															ep.etape_projet_id = hl.etape_projet_id
															and ep.projet_id = l.projet_id
														GROUP BY
															hl.lot_id,
															ep.etape_id) t
													GROUP BY
														lot_id) t1,
													(SELECT
														count(*) nb_etape,
														lot_id,
														nombre_doc
													FROM
														etape_projet,
														lot
													WHERE
														etape_projet.projet_id = lot.projet_id
														and lot.lot_id in (
															SELECT
																lot_id
															FROM
																lot
														)
													GROUP BY
														lot.lot_id) t2,
													(SELECT
														lot_id,
														max(datetime_debut_max) as datetime_debut_max,
														max(t.delai)*60 as delai
													FROM
														(SELECT
															hl.lot_id,
															ep.delai,
															ep.ordre,
															max(hl.datetime_debut) datetime_debut_max,
															max(hl.datetime_fin) datetime_fin_max
														FROM
															etape_projet ep,
															historique_lot hl
														WHERE
															hl.etape_projet_id = ep.etape_projet_id
														GROUP BY
															ep.etape_id,
															hl.lot_id
														ORDER BY
															hl.lot_id,
															ep.ordre) t
													GROUP BY
														t.lot_id) t3
													WHERE
														t1.lot_id = t2.lot_id
														AND t1.lot_id = t3.lot_id
														AND t1.lot_id = l.lot_id
													GROUP BY
														t1.lot_id
												) req
											ON l.lot_id = req.lot_id
											WHERE 1=1  " . $myFiltreDate . "  ) tab
										WHERE 1=1  " . $myFiltre . " " . $myFiltreEtat . "

										) tb1
									GROUP BY projet_id
									) tb4
								ON tb3.projet_id = tb4.projet_id) tb5
							INNER JOIN etape ep
							ON tb5.etape_id = ep.etape_id
							
						) tab1
						INNER JOIN
						(
						SELECT 	
							projet_id, nom_projet
						FROM 
							projet 
						) tab2
						ON tab1.projet_id = tab2.projet_id							
					) data1
					inner join
					(
						SELECT 
							ep.projet_id
							,uep.etape_projet_id
							,ep.etape_id
							,ordre
							,defaut
							, " . $caseStr . "
						FROM 
							projet p
							inner join
							etape_projet ep
							on p.projet_id = ep.projet_id
							inner join
							etape e
							on ep.etape_id = e.etape_id
							left join (
								select * from user_etape_projet where user_id = ".$id_user."
							) uep
							on ep.etape_projet_id = uep.etape_projet_id
					) data2
					on data1.projet_id = data2.projet_id and data1.etape_id = data2.etape_id
							";
                $data = array();
                $data_stat = DB::query(Database::SELECT, $query)->execute()->as_array();

                $this->response->body(json_encode($data_stat));
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }

    /*
     * FONCTION POUR LA FORMATION DE LA REQUETE SUR LE FILTRE(MAKE WHERE)
     */

    private function setAndFiltreMultipleID($champ_value, $champ_nom) {
        $strret = '';
        if ($champ_value != '') {
            $data = $champ_value;
            $data = explode('#', $data);
            $nb = count($data);
            $i = 0;
            foreach ($data as $val) {
                $strret .= $val;
                if ($i < ($nb - 1)) {
                    $strret .= ',';
                    $i++;
                }
            }
            $strret = ' AND lot.' . $champ_nom . ' IN (' . $strret . ') ';
        }
        return $strret;
    }
	private function setAndFiltreMultipleValueString($champ_value, $champ_nom) {
        $strret = '';
        if ($champ_value != '') {
            $data = $champ_value;
            $data = explode(',', $data);
            $nb = count($data);
            $i = 0;
            foreach ($data as $val) {
                $strret .="'". $val ."'";
                if ($i < ($nb - 1)) {
                    $strret .= ',';
                    $i++;
                }
            }
            $strret = ' AND lot.' . $champ_nom . ' IN (' . $strret . ') ';
        }
        return $strret;
    }

    private function setAndFiltreMultipleValue($champ_value, $champ_nom) {
        $strret1 = '';
        $strret = '';
        if ($champ_value != '') {
            $data = explode(',', $champ_value);
            $nb = count($data);
            $i = 0;
            foreach ($data as $val) {
                $strret .= "'" . $val . "'";
                if ($i < ($nb - 1)) {
                    $strret .= ',';
                    $i++;
                }
            }
        }
        $strret1 = ' AND ' . $champ_nom . ' IN (' . $strret . ') ';
        return $strret1;
    }

    private function setAndFiltreDate($data_datercpt, $nom_champ) {
        $valDate = array();
        $dat1 = array();
        $dat2 = array();
        $ret = '';
        if ($data_datercpt != '') {
            $valDate = explode(' | ', $data_datercpt);
            if (isset($valDate)) {
                $dat1 = explode('_', $valDate[0]);
                if (isset($dat1))
                    $str_datercpt[0] = $dat1[2] . '-' . $dat1[1] . '-' . $dat1[0];
                else
                    $str_datercpt[0] = '';
                $dat2 = explode('_', $valDate[1]);
                if (isset($dat2))
                    $str_datercpt[1] = $dat2[2] . '-' . $dat2[1] . '-' . $dat2[0];
                else
                    $str_datercpt[1] = '';
            }
        }
        if ($str_datercpt[0] != '' && $str_datercpt[1] != '') {
            $ret .= " AND $nom_champ >= '" . $str_datercpt[0] . "' ";
            $ret .= " AND $nom_champ <= '" . $str_datercpt[1] . "' ";
        }
        return $ret;
    }

    public function makeWhereFiltre($request) {
        $str_list = '';
        if ($request['filtre'] == 1) {
            if ($request['data_projet'] != '') {
                $str_list .= $this->setAndFiltreMultipleID($request['data_projet'], 'projet_id');
            }
            if ($request['data_commande_vivetic'] != '') {
                $str_list .= $this->setAndFiltreMultipleValueString($request['data_commande_vivetic'], 'commande_vivetic');
            }
            if ($request['data_lot'] != '') {
                $str_list .= $this->setAndFiltreMultipleID($request['data_lot'], 'lot_id');
            }
            if ($request['data_etat'] != '') {
                $str_list .= $this->setAndFiltreMultipleValue($request['data_etat'], 'etat');
            }
            if ($request['data_datetime_creation'] != '') {
                $str_list .= $this->setAndFiltreDate($request['data_datetime_creation'], 'datetime_creation');
            }

            if ($request['data_nom_zip'] != '') {
                $str_list .= $this->setAndFiltreMultipleID($request['data_nom_zip'], 'lot_id');
            }
        }
        return $str_list;
    }

    function makeWhereFiltreStat($request) {
        $str_list = '';
        if ($request['date_creation'] != '') {
            $str_list .= $this->setAndFiltreDate($request['date_creation'], 'ladate');
        }
        return $str_list;
    }

    private function setAndFiltreMultipleValueStringAVG($champ_value, $champ_nom) {
        $strret = '';
        if ($champ_value != '') {
            $data = $champ_value;
            $data = explode('#', $data);
            $nb = count($data);
            $i = 0;
            foreach ($data as $val) {
                $strret .= "'" .$val. "'";
                if ($i < ($nb - 1)) {
                    $strret .= ',';
                    $i++;
                }
            }
            $strret = ' AND ' . $champ_nom . ' IN (' . $strret . ') ';
        }
        return $strret;
    }
	private function setAndFiltreMultipleIDProjet($champ_value, $champ_nom) {
        $strret = '';
        if ($champ_value != '') {
            $data = $champ_value;
            $data = explode('#', $data);
            $nb = count($data);
            $i = 0;
            foreach ($data as $val) {
                $strret .= $val;
                if ($i < ($nb - 1)) {
                    $strret .= ',';
                    $i++;
                }
            }
            $strret = ' AND ' . $champ_nom . ' IN (' . $strret . ') ';
        }
        return $strret;
    }

    function makeWhereFiltreAvancement($request,$strprojet_id) {
        $str_list = '';
        if ($request['data_projet'] != '') {
            $str_list .= $this->setAndFiltreMultipleIDProjet($request['data_projet'], 'projet_id');
        }else{
			$str_list .= $strprojet_id;
		}
        if ($request['data_commande_vivetic'] != '') {
            $str_list .= $this->setAndFiltreMultipleValueStringAVG($request['data_commande_vivetic'], 'commande_vivetic');
        }
        if ($request['data_lot'] != '') {
            $str_list .= $this->setAndFiltreMultipleIDProjet($request['data_lot'], 'lot_id');
        }
        if ($request['data_nom_zip'] != '') {
            $str_list .= $this->setAndFiltreMultipleIDProjet($request['data_nom_zip'], 'lot_id');
        }
        return $str_list;
    }
	function makeWhereFiltreMultiIdAvancement($request) {
        $str_list = '';
        if ($request['data_projet'] != '') {
            $str_list .= $this->setAndFiltreMultipleIDProjet($request['data_projet'], 'projet_id');
        }
        if ($request['data_lot'] != '') {
            $str_list .= $this->setAndFiltreMultipleIDProjet($request['data_lot'], 'lot_id');
        }
        if ($request['data_nom_zip'] != '') {
            $str_list .= $this->setAndFiltreMultipleIDProjet($request['data_nom_zip'], 'lot_id');
        }
        return $str_list;
    }

    private function setAndFiltreMultipleValueAvancement($champ_value, $champ_nom) {
        $strret1 = '';
        $strret = '';
        if ($champ_value != '') {
            $data = explode(',', $champ_value);
            $nb = count($data);
            $i = 0;
            foreach ($data as $val) {
                $strret .= "'" . $val . "'";
                if ($i < ($nb - 1)) {
                    $strret .= ',';
                    $i++;
                }
            }
        }
        $strret1 = ' AND ' . $champ_nom . ' IN (' . $strret . ') ';
        return $strret1;
    }

    private function setAndFiltreDateAvancement($data_datercpt, $nom_champ) {
        $valDate = array();
        $dat1 = array();
        $dat2 = array();
        $ret = '';
        if ($data_datercpt != '') {
            $valDate = explode(' | ', $data_datercpt);
            if (isset($valDate)) {
                $dat1 = explode('_', $valDate[0]);
                if (isset($dat1))
                    $str_datercpt[0] = $dat1[2] . '-' . $dat1[1] . '-' . $dat1[0];
                else
                    $str_datercpt[0] = '';
                $dat2 = explode('_', $valDate[1]);
                if (isset($dat2))
                    $str_datercpt[1] = $dat2[2] . '-' . $dat2[1] . '-' . $dat2[0];
                else
                    $str_datercpt[1] = '';
            }
        }
        if ($str_datercpt[0] != '' && $str_datercpt[1] != '') {
            $ret .= " AND l." . $nom_champ . " >= '" . $str_datercpt[0] . "' ";
            $ret .= " AND l." . $nom_champ . " <= '" . $str_datercpt[1] . "' ";
        }
        return $ret;
    }

    private function getSqlExportStatistique($id, $mwFiltre, $select, $groupby) {
        $query = $select . "	SELECT
						ladate
						,numero_sem
						,numero_mois
						,nb_total_lot
						,nb_total_doc
						,nb_moyen_doc
						,nb_lot_termine
						,delais_traitement_moyen
						,lot_en_cours
						,CASE WHEN nb_message IS NULL THEN 0 ELSE nb_message END nb_message
						,CASE WHEN moyenne_message IS NULL THEN 0 ELSE moyenne_message END moyenne_message
						,projet_id
						,CASE WHEN nb_lot IS NULL THEN 0 ELSE nb_lot END nb_lot
					FROM
						(
						SELECT
							ladate
							,numero_sem
							,numero_mois
							,nb_total_lot
							,nb_total_doc
							,nb_moyen_doc
							,nb_lot_termine
							,delais_traitement_moyen
							,CASE WHEN lot_en_cours IS NULL THEN 0 ELSE lot_en_cours END lot_en_cours
							,projet_id
						FROM
							(
							SELECT
								ladate
								,numero_sem
								,numero_mois
								,nb_total_lot
								,nb_total_doc
								,nb_moyen_doc
								,CASE WHEN nb_lot_termine IS NULL THEN 0 ELSE nb_lot_termine END nb_lot_termine
								,CASE WHEN delais_traitement_moyen IS NULL THEN 0 ELSE delais_traitement_moyen END delais_traitement_moyen
								,projet_id
							FROM
								(
								SELECT
									ladate
									,numero_sem
									,numero_mois
									,CASE WHEN nb_total_lot IS NULL THEN 0 ELSE nb_total_lot END nb_total_lot
									,CASE WHEN nb_total_doc IS NULL THEN 0 ELSE nb_total_doc END nb_total_doc
									,CASE WHEN nb_moyen_doc IS NULL THEN 0 ELSE nb_moyen_doc END nb_moyen_doc
									,CASE WHEN projet_id IS NULL THEN 1 ELSE projet_id END projet_id
								FROM
									(
										SELECT
											ladate
											,WEEKOFYEAR(ladate) numero_sem
											,DAYOFYEAR(ladate) numero_jour
											,MONTH(ladate) numero_mois
										FROM
										(
											SELECT (CURDATE() - INTERVAL c.number DAY) AS ladate
											FROM (SELECT singles + tens + hundreds number FROM
											( SELECT 0 singles
											UNION ALL SELECT   1 UNION ALL SELECT   2 UNION ALL SELECT   3
											UNION ALL SELECT   4 UNION ALL SELECT   5 UNION ALL SELECT   6
											UNION ALL SELECT   7 UNION ALL SELECT   8 UNION ALL SELECT   9
											) singles JOIN
											(SELECT 0 tens
											UNION ALL SELECT  10 UNION ALL SELECT  20 UNION ALL SELECT  30
											UNION ALL SELECT  40 UNION ALL SELECT  50 UNION ALL SELECT  60
											UNION ALL SELECT  70 UNION ALL SELECT  80 UNION ALL SELECT  90
											) tens  JOIN
											(SELECT 0 hundreds
											UNION ALL SELECT  100 UNION ALL SELECT  200 UNION ALL SELECT  300
											UNION ALL SELECT  400 UNION ALL SELECT  500 UNION ALL SELECT  600
											UNION ALL SELECT  700 UNION ALL SELECT  800 UNION ALL SELECT  900
											) hundreds
											ORDER BY number DESC) c
											WHERE c.number BETWEEN 0 AND 365
										)ab
									)calendrier

								LEFT JOIN (
										SELECT
											nb_total_lot,
											nb_total_doc,
											(nb_total_doc/nb_total_lot) nb_moyen_doc,
											projet_id
											,datetime_creation
										FROM
											(
												SELECT
													COUNT(lot_id) nb_total_lot,
													SUM(nombre_doc) nb_total_doc,
													projet_id,
													DATE(datetime_creation) datetime_creation

												FROM lot
												WHERE termine != 2
												AND projet_id IN (" . $id . ")
												GROUP BY projet_id,
												DATE(datetime_creation)
											) tb1
									) donnee
								ON calendrier.ladate = donnee.datetime_creation
								) data1
							LEFT JOIN
								(
								SELECT
									COUNT(lot_id) nb_lot_termine, (SUM(duree_traitement)/COUNT(lot_id)) delais_traitement_moyen, datetime_fin
								FROM
									(SELECT
										tb6.lot_id,
										TIME_TO_SEC(TIME_FORMAT(SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
										tb6.datetime_validation,
										tb6.datetime_fin)),
										'%H:%i')) duree_traitement
										, tb6.projet_id
										,DATE(tb6.datetime_fin) datetime_fin
									FROM
										(SELECT
											tb4.max_id, tb4.etape_projet_id, tb5.lot_id, tb4.datetime_fin, tb5.datetime_validation, tb5.projet_id
										FROM
											(SELECT
												tb2.max_id, tb2.etape_projet_id, tb2.lot_id, tb3.datetime_fin, tb2.projet_id
											FROM
												(SELECT
													h2.max_id, h2.etape_projet_id,h2.lot_id, h2.projet_id
												FROM
													(SELECT
														max_id,etape_projet_id,l.lot_id,l.projet_id
													FROM
														(SELECT
															lot_id,projet_id,DATE(datetime_creation) datetime_creation
														FROM 	lot
														WHERE termine != 2
														AND projet_id IN (" . $id . ") ) l
													INNER JOIN
														(SELECT
															MAX(historique_lot_id)  AS max_id , etape_projet_id, lot_id
														FROM
															historique_lot
														GROUP BY
														lot_id,
														etape_projet_id) h
													ON l.lot_id = h.lot_id) h2
												INNER JOIN
													(SELECT
													etape_projet_id, tb1.projet_id
													FROM
														etape_projet ep
													INNER JOIN
														(
														SELECT
															projet_id,
															MAX(ordre) ordre
														FROM
															etape_projet
														WHERE 1=1 AND projet_id IN (" . $id . ")
														) tb1
													ON ep.projet_id = tb1.projet_id AND ep.ordre = tb1.ordre
													) ep1
												ON h2.etape_projet_id = ep1.etape_projet_id AND h2.projet_id = ep1.projet_id) tb2  /**/
											INNER JOIN
												historique_lot tb3
											ON tb2.max_id = tb3.historique_lot_id) tb4
										INNER JOIN
											(SELECT
												lot_id,projet_id,datetime_creation datetime_validation
											FROM 	lot
											WHERE	termine = 1 AND datetime_creation IS NOT NULL
											AND projet_id IN (" . $id . ") ) tb5
										ON tb4.lot_id = tb5.lot_id) tb6
									) tb7
								GROUP BY datetime_fin
								) donnee
							ON donnee.datetime_fin = data1.ladate
							) donnee
						LEFT JOIN
							(
							SELECT
								COUNT(lot_id) lot_en_cours, datetime_debut
							FROM
								(
								SELECT
									lot.lot_id, etape_projet_id, datetime_debut, projet_id
								FROM
									(
									SELECT
										lot_id, projet_id
									FROM
										lot
									WHERE termine = 0
									AND projet_id IN (" . $id . ")
									) lot
								INNER JOIN
									(
									SELECT
										historique_lot_id, lot_id, etape_projet_id, DATE(datetime_debut) datetime_debut
									FROM
										historique_lot
									) hlot
								ON lot.lot_id = hlot.lot_id
								WHERE etape_projet_id !=(
												SELECT
													etape_projet_id
												FROM
													etape_projet
												WHERE 1=1 AND projet_id IN (" . $id . ")
												AND ordre IN (	SELECT
															max(ordre)
														FROM etape_projet
														WHERE 1=1 AND projet_id IN (" . $id . ")
														 )
											)
								GROUP BY lot_id, etape_projet_id, datetime_debut
								) tab
							GROUP BY datetime_debut
							) data1
						ON donnee.ladate = data1.datetime_debut
						) donnee
					LEFT JOIN
						(
						SELECT
							SUM(nb_message) nb_message, SUM(nb_message)/COUNT(lot_id) moyenne_message, datetime_creation, COUNT(lot_id) nb_lot
						FROM
							(
							SELECT
								COUNT(message_id) nb_message, lot_id, datetime_creation
							FROM
								(
								SELECT
									message_id, lot.lot_id, DATE(datetime_creation) datetime_creation
								FROM
									(
									SELECT
										lot_id
									FROM
										lot
									WHERE 1=1 AND projet_id IN (" . $id . ")
									) lot
								INNER JOIN
									(
									SELECT
										message_id, datetime_creation, lot_id
									FROM
										message
									) message
								ON lot.lot_id = message.lot_id
								) tab
							GROUP BY lot_id, datetime_creation
							) tab
						GROUP BY datetime_creation
						) data1
					ON donnee.ladate = data1.datetime_creation
					WHERE 1=1 " . $mwFiltre . $groupby;
        return $query;
    }

}

?>