<?php

defined('SYSPATH') or die('No direct script access.');

final class Controller_Etape_Projet extends Controller_Website {

    final public function action_info() {
        
    }

    final public function action_list() {
        try {

            $role_act = $this->current_user_role;
            /*
              $role_act = 2 -> administrateur vivetic
              $role_act = 4 -> administrateur fthm
              les droits changent suivant le role de l'utilisateur
             */
            if (($role_act == "2") || ($role_act == "4")) {

                $this->template->content = View::factory('contents/Etape_Projet/list');
                $this->template->content->current_user_role = $role_act;

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
                $this->template->content->projet =
                        ORM::factory('Projet')
                        ->find_all()
                        ->as_array('projet_id', 'nom_projet');

                if ($role_act == "2") {
                    $this->template->content->role =
                            ORM::factory('Role')
                            ->where('name', '!=', 'login')
                            ->find_all()
                            ->as_array('id', 'description');
                } else {
                    $this->template->content->role =
                            ORM::factory('Role')
                            ->where('name', '!=', 'login')
                            ->where('name', 'like', 'fthm_%')
                            ->find_all()
                            ->as_array('id', 'description');
                }
            } else {
                $this->template->content = Kohana::message('misc', 'role.error_create');
            }
        } catch (Exception $exc) {
            Kohana::$log->add(LOG::ERROR, $exc->getMessage());
            $this->template->preJSAction = 'alert("' . Kohana::message('misc', 'misc.error') . $exc->getMessage() . '");';
        }
    }

    public function action_ajax_browse() {

        /* test role */
        $role_act = $this->current_user_role;

        if (($role_act == "2") || ($role_act == "4")) {

            if (DataTables::is_request()) {

                if ($role_act == "2") {
                    $etapeProjet = ORM::factory('Etape_Projet')->with('projet')->with('etape');
                    $etapeProjet->find_all();
                }

                $paginate = Paginate::factory($etapeProjet)
                        ->columns(array(
                    'etape_projet_id',
                    'projet_id',
                    'etape_id',
                    'ordre',
                    'delai'
                        ));

                $clTzSec = Session::instance()->get('clTzSec');
                $clTzSecDI = DateInterval::createFromDateString($clTzSec . ' seconds');
                $utcTz = new DateTimezone('UTC');

                $datatables = DataTables::factory($paginate)->execute();
                foreach ($datatables->result() as $cnt) {
                    $delai = '';
                    if ($cnt->delai != '0000-00-00 00:00:00') {
                        $delaiDT = new DateTime($cnt->delai, $utcTz);
                        $delaiDT->add($clTzSecDI);
                        $delai = $delaiDT->format('d/m/Y H:i:s');
                    }
                    $datatables->add_row(array(
                        $cnt->etape_projet_id,
                        $cnt->projet->nom_projet,
                        $cnt->etape->libelle,
                        $cnt->ordre,
                        $delai,
                    ));
                }

                $this->response->body($datatables->render());
            }
            else
                throw new HTTP_Exception_500();
        }
    }

    public function action_ajax_getProjet_get() {
        $state = $this->request->param('id');

        try {

            if ($state == 'true') {
                $projets = ORM::factory('Projet');
                $projets->find_all();
                $array_projet = array();
                $compteur = 0;
                foreach ($projets as $prj){
                    $array_projet[$compteur]["projet_id"] = $prj 
                }
                echo $projet->count_all();
                $this->response->body(json_encode($projet));
            }
            else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {

            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }

    /*
      final public function action_ajax_etape_get() {
      $etape_id = $this->request->param('id');
      try {

      if ($etape_id) {
      $etape_data = ORM::factory('Etape', $etape_id)->as_array();
      $defaut = 'Oui';
      //                if ($cnt['defaut'] != 0) {
      //                    $defaut = 'Non';
      //                }
      $this->response->body(json_encode($etape_data));
      }
      else
      throw new HTTP_Exception_500();
      } catch (Exception $exc) {

      $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
      }
      }

      final public function action_post_etape_insert() {
      if (HTTP_Request::POST == $this->request->method()) {

      $postData = $this->request->post();

      $config = Kohana::$config->load('website');
      $isInsert = empty($postData['id']);

      $tvalidation = array(
      'status' => '0',
      'message' => '',
      );

      try {
      if ($isInsert) {
      $etape = ORM::factory('Etape');
      $etape->libelle = $postData['libelle'];
      $etape->defaut = $postData['defaut'];
      $etape->create();
      } else {
      $etape = ORM::factory('Etape', $postData['id']);
      $etape->libelle = $postData['libelle'];
      $etape->defaut = $postData['defaut'];
      if (!$etape->loaded()) {
      throw new Exception(Kohana::message('misc', 'etape.defaut_not_exists'));
      }
      //Opérateur fthm = 4, Administrateur fthm = 5
      $etape->update();
      }

      $_POST = array();

      $sms = ($isInsert ? 'Ajout effectué.' : 'Modification effectuée.');
      $tvalidation['message'] = $sms;
      } catch (ORM_Validation_Exception $e) {
      $tvalidation['status'] = 1;

      foreach ($e->errors('models') as $field_name => $err_msg) {
      if ($field_name == 'libelle') {

      $tvalidation['status'] = 2;
      $tvalidation['message'] = $err_msg;
      break;
      } elseif ($field_name == 'defaut') {
      $tvalidation['status'] = 3;
      $tvalidation['message'] = $err_msg;
      break;
      }
      }
      } catch (Exception $ex) {
      $tvalidation['status'] = 1;
      $tvalidation['message'] = Kohana::message('misc', 'misc.error') . $ex->getMessage();
      }
      $this->response->body(json_encode($tvalidation));
      }
      }

      final public function action_ajax_etape_delete() {

      $etape_id = $this->request->param('id');
      if ($etape_id) {
      try {
      $etape = ORM::factory('Etape', $etape_id);
      if ($etape_id) {
      $etape->delete();
      }
      } catch (Exception $exc) {
      $this->template->content = Kohana::message('misc', 'database.error_connexion');
      }
      }
      else
      throw new HTTP_Exception_500();
      }
     */
}

?>