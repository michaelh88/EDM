<?php

defined('SYSPATH') or die('No direct script access.');

final class Controller_User extends Controller_Website {

    final public function action_info() {
        $cur_role = $this->current_user_role;
        $this->template->content = View::factory('contents/User/info');

        $this->template->content->user = $this->current_user;
        $this->template->content->role = $this->current_user_role->description;
        $user_projet = DB::select('projet.projet_id', 'projet.nom_projet')
                ->from('projet')
                ->join('roles_users')
                ->on('projet.projet_id', '=', 'roles_users.projet_id')
                ->where('roles_users.user_id', '=', $this->current_user->id)
                ->where('role_id', '!=', '1')
                ->execute()
                ->as_array();

        $sql_usp = "
			SELECT 
				projet_id,
				GROUP_CONCAT(nom_projet separator ', ') AS nom_projet
			FROM
				projet
			WHERE
				projet_id IN (
					SELECT projet_id FROM projet_user WHERE user_id = " . $this->current_user->id . "
				)				
		";
        $user_projet1 = DB::query(Database::SELECT, $sql_usp)
                ->execute()
                ->as_array();


        $sql = "
			SELECT 
				GROUP_CONCAT(nom_projet) AS projs
			FROM
				projet
			WHERE
				projet_id IN (
					SELECT projet_id FROM projet_user WHERE user_id = " . $this->current_user->id . "
				)
		";

        $user_projet2 = DB::query(Database::SELECT, $sql)
                ->execute()
                ->as_array();

        $array_projet = array("projet_id" => 0, "nom_projet" => "Administrateur de projet");
        if (($cur_role == "2") || ($cur_role == "4")) {
            $this->template->content->projet = $array_projet;
        } else {
            $this->template->content->projet = $user_projet1[0];
            $this->current_user_projet = $user_projet1[0]['projet_id'];
        }
    }

    final public function action_list() {

        try {

            $role_act = $this->current_user_role;
            /*
              $role_act = 2 -> administrateur vivetic
              $role_act = 4 -> administrateur fthm
              les droits changent suivant le role de l'utilisateur
             */
            $users = array();
            $projs = array();
            $etps = array();
            if (($role_act == "2") || ($role_act == "4")) {

                $this->template->content = View::factory('contents/User/list')
                        ->bind("tb_user", $users)
                        ->bind("tb_proj", $projs)
                        ->bind("liste_etape", $etps)
                ;
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

                $proj = ORM::factory("Projet")
                        ->find_all()
                        ->as_array('projet_id', 'nom_projet');
                $this->template->content->tb_proj = $proj;
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

                $cur_role = $this->current_user_role;
                $etp = array();
                $this->template->content->liste_etape = $etp;
                $sql = "
					SELECT 
						projet_id
					FROM projet_user
					WHERE user_id = " . $this->current_user->id . "
				";
                $rs_prj = DB::query(Database::SELECT, $sql)->execute()->as_array();

                if (($cur_role == "2") || ($cur_role == "4")) {
                    $proj = ORM::factory("Projet")
                            ->find_all()
                            ->as_array('projet_id', 'nom_projet');

                    // $arr_rol = [3, 5, 6]; Original
                    $arr_rol = array(3, 5, 6); //Modif Heritiana
                    // $arr_rol_ft = [5, 6]; Original
                    $arr_rol_ft = array(5, 6); //Modif Heritiana
                    if ($cur_role == "2") {
                        $users = DB::select(
                                        'users.id', 'users.username'
                                )
                                ->from('users')
                                ->join('roles_users')
                                ->on('users.id', '=', 'roles_users.user_id')
                                ->join('roles')
                                ->on('roles.id', '=', 'roles_users.role_id')
                                ->where('roles.id', '!=', '1')
                                ->execute()
                                ->as_array('id', 'username')
                        ;
                    } else {
                        $users = DB::select(
                                        'users.id', 'users.username'
                                )
                                ->from('users')
                                ->join('roles_users')
                                ->on('users.id', '=', 'roles_users.user_id')
                                ->join('roles')
                                ->on('roles.id', '=', 'roles_users.role_id')
                                ->where('roles.name', 'like', 'fthm_%')
                                ->execute()
                                ->as_array('id', 'username')
                        ;
                    }
                } else {
                    $proj = ORM::factory("Projet")
                            ->where('projet_id', 'in', $rs_prj)
                            ->find_all()
                            ->as_array('projet_id', 'nom_projet');
                }
                $this->template->content->tb_proj = $proj;
                $this->template->content->tb_user = $users;
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

                    $users = DB::select(
                                    'users.id', 'users.username', 'users.email', 'users.userlastname', 'users.userfirstname', 'roles.description', 'users.date_creation', 'users.date_modification', 'users.last_login', 'users.logins'
                            )
                            ->from('users')
                            ->join('roles_users')
                            ->on('users.id', '=', 'roles_users.user_id')
                            ->join('roles')
                            ->on('roles.id', '=', 'roles_users.role_id')
                            ->where('roles.id', '!=', '1');
                } else {
                    $users = DB::select(
                                    'users.id', 'users.username', 'users.email', 'users.userlastname', 'users.userfirstname', 'roles.description', 'users.date_creation', 'users.date_modification', 'users.last_login', 'users.logins'
                            )
                            ->from('users')
                            ->join('roles_users')
                            ->on('users.id', '=', 'roles_users.user_id')
                            ->join('roles')
                            ->on('roles.id', '=', 'roles_users.role_id')
                            ->where('roles.name', 'like', 'fthm_%');
                }

                $paginate = Paginate::factory($users)
                        ->columns(array(
                    'users.id',
                    'users.username',
                    'users.email',
                    'users.userlastname',
                    'users.userfirstname',
                    'roles.description',
                    'users.date_creation',
                    'users.date_modification',
                    'users.last_login',
                    'users.logins'
                        ));

                $datatables = DataTables::factory($paginate)->execute();

                $clTzSec = Session::instance()->get('clTzSec');
                $clTzSecDI = DateInterval::createFromDateString($clTzSec . ' seconds');
                $utcTz = new DateTimezone('UTC');

                foreach ($datatables->result() as $cnt) {

                    $lastLogin = '';
                    if ($cnt['last_login'] != NULL) {

                        $lastLoginDT = new DateTime();
                        $lastLoginDT->setTimezone($utcTz);
                        $lastLoginDT->setTimestamp($cnt['last_login']);
                        $lastLoginDT->add($clTzSecDI);
                        $lastLogin = $lastLoginDT->format('d/m/Y H:i:s');
                    }

                    $dateCreation = '';
                    if ($cnt['date_creation'] != '0000-00-00 00:00:00') {

                        $dateCreationDT = new DateTime($cnt['date_creation'], $utcTz);
                        $dateCreationDT->add($clTzSecDI);
                        $dateCreation = $dateCreationDT->format('d/m/Y H:i:s');
                    }

                    $dateModification = '';
                    if ($cnt['date_modification'] != '0000-00-00 00:00:00') {

                        $dateModificationDT = new DateTime($cnt['date_modification'], $utcTz);
                        $dateModificationDT->add($clTzSecDI);
                        $dateModification = $dateModificationDT->format('d/m/Y H:i:s');
                    }

                    $datatables->add_row(array(
                        $cnt['id'],
                        $cnt['username'],
                        '<a href="mailto:' . $cnt['email'] . '">' . $cnt['email'] . '</a>',
                        $cnt['userlastname'],
                        $cnt['userfirstname'],
                        $cnt['description'],
                        $dateCreation,
                        $dateModification,
                        $lastLogin,
                        $cnt['logins']
                    ));
                }

                $this->response->body($datatables->render());
            }
            else
                throw new HTTP_Exception_500();
        }
    }

    final public function action_post_user_insert() {

        if (HTTP_Request::POST == $this->request->method()) {

            $postData = $this->request->post();

            $config = Kohana::$config->load('website');
            $isInsert = empty($postData['id']);

            $tvalidation = array(
                'status' => '0',
                'message' => '',
            );
			$upseuil = false;
            try {

                if ($isInsert) {
					$cur_role = $this->current_user_role;
					if ($cur_role=="4") {
						$sql = "
							SELECT 
								COUNT(*) AS nb
							FROM 
								users u
								INNER JOIN roles_users ru
									ON u.id = ru.user_id
								INNER JOIN roles r
									ON ru.role_id = r.id		
							WHERE r.id IN (4,5,6)
						";
						$resu = DB::query(Database::SELECT,$sql)->execute();
						$nb = 0;
						foreach ($resu as $ligne) {
							$nb = intval($ligne["nb"]);
						}
						if ($nb>=20) {
							$upseuil = true;
						}
					}
					if (!$upseuil) {

						$user = ORM::factory('User');
						$user->email = $postData['email'];
						$user->username = $postData['username'];
						$user->userlastname = $postData['userlastname'];
						$user->userfirstname = $postData['userfirstname'];
						$user->password = $postData['password'];
						$dateCreationTS = time() - date('Z');
						$postData['date_creation'] = date('Y-m-d H:i:s', $dateCreationTS);

						$user->create_user(
								$postData, array('email', 'username', 'userfirstname', 'userlastname', 'password', 'date_creation')
						);

						$user->add('roles', ORM::factory('Role', array('name' => 'login')));
						$user->add('roles', ORM::factory('Role', $postData['role']));

						$action_utilisateur = "Creation utilisateur : " . $user->username;
						$loginfo = "[Utilisateur : " . $this->current_user->username . "] [Action : " . $action_utilisateur . "]";
						Kohana::$log->add(LOG::INFO, $loginfo);

						if ($postData['projet'] != ''){
							foreach ($postData['projet'] as $num_proj) {
								DB::query(Database::INSERT, "insert into projet_user (projet_id,user_id)  values (" . $num_proj . "," . $user->id . " )")->execute();
							}
						}
						else
							throw new Exception('Un projet doit être assigné');
						// DB::update('roles_users')->set(array('projet_id'=>$postData['projet']))->where('user_id','=',$user->id)->execute();
					}
                } else {
                    $user = ORM::factory('User', $postData['id']);

                    if (!$user->loaded()) {
                        throw new Exception(Kohana::message('misc', 'user.user_not_exists'));
                    }

                    $action_utilisateur = "Modification utilisateur : " . $postData['username'];
                    $loginfo = "[Utilisateur : " . $this->current_user->username . "] [Action : " . $action_utilisateur . "]";
                    Kohana::$log->add(LOG::INFO, $loginfo);

                    //Opérateur fthm = 4, Administrateur fthm = 5

                    $dateModificationTS = time() - date('Z');
                    $postData['date_modification'] = date('Y-m-d H:i:s', $dateModificationTS);
                    $user->update_user(
                            $postData, array('username', 'userfirstname', 'userlastname', 'password', 'email', 'date_modification')
                    );


                    foreach ($user->roles->where('name', '!=', 'login')->find_all() as $role)
                        $user->remove('roles', $role);

                    $user->add('roles', ORM::factory('Role', $postData['role']));
                    // DB::update('roles_users')->set(array('projet_id'=>$postData['projet']))->where('user_id','=',$user->id)->execute();
                    if ($postData['projet'] != ''){
						DB::query(Database::DELETE, "delete from projet_user where user_id=" . $user->id . " ")->execute();
						foreach ($postData['projet'] as $num_proj) {
                            DB::query(Database::INSERT, "insert into projet_user (projet_id,user_id)  values (" . $num_proj . "," . $user->id . " )")->execute();
                        }
					}else
                        throw new Exception('Un projet doit être assigné');
                }

                $_POST = array();

                $sms = ($isInsert ? 'Ajout effectué.' : 'Modification effectuée.');
				if ($upseuil) { $sms= "Nombre d'utilisateurs autorisé depassé, vous ne pouvez plus ajouter";}
                $tvalidation['message'] = $sms;
            } catch (ORM_Validation_Exception $e) {

                $tvalidation['status'] = 1;

                foreach ($e->errors('models') as $field_name => $err_msg) {

                    if ($field_name == 'email') {

                        $tvalidation['status'] = 2;
                        $tvalidation['message'] = $err_msg;
                        break;
                    }
                    if ($field_name == 'username') {

                        $tvalidation['status'] = 3;
                        $tvalidation['message'] = $err_msg;
                        break;
                    } elseif ($field_name == 'userlastname') {

                        $tvalidation['status'] = 4;
                        $tvalidation['message'] = $err_msg;
                        break;
                    } elseif ($field_name == 'userfirstname') {

                        $tvalidation['status'] = 5;
                        $tvalidation['message'] = $err_msg;
                        break;
                    } elseif ($field_name == '_external') {

                        $tvalidation['status'] = 6;
                        $tvalidation['message'] = reset($err_msg);
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

    final public function action_ajax_user_get() {

        $user_id = $this->request->param('id');
        $cur_us = $this->current_user;

        try {

            if ($user_id) {

                $user_data = ORM::factory('User', $user_id)->as_array();

                $user_role_data = DB::select('role_id', 'projet_id')
                        ->from('roles_users')
                        ->where('user_id', '=', $user_id)
                        ->where('role_id', '!=', '1')
                        ->execute()
                        ->as_array();

                $user_data['canBeDeleted'] = $user_id == $cur_us ? 0 : 1;


                if ($user_data['last_login'] != NULL) {

                    $clTzSec = Session::instance()->get('clTzSec');
                    $lastLoginDT = new DateTime();
                    $lastLoginDT->setTimezone(new DateTimezone('UTC'));
                    $lastLoginDT->setTimestamp($user_data['last_login']);
                    $lastLoginDT = date_add($lastLoginDT, DateInterval::createFromDateString($clTzSec . ' seconds'));
                    $user_data['last_login'] = $lastLoginDT->format('d/m/Y H:i:s');
                }
                else
                    $user_data['last_login'] = '';

                $user_data['role_id'] = $user_role_data[0]['role_id'];
                $sql_usp = "
					SELECT projet_id FROM projet_user WHERE user_id = " . $user_id . "
				";
                $lignes = DB::query(Database::SELECT, $sql_usp)
                        ->execute()
                        ->as_array();
                $arr_projet = array();
                foreach ($lignes as $ligne) {
                    $arr_projet[] = $ligne["projet_id"];
                }
                $user_data['projet_id'] = $arr_projet;

                $this->response->body(json_encode($user_data));
            }
            else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {

            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }

    final public function action_ajax_user_delete() {

        $user_id = $this->request->param('id');
        $cur_us = $this->current_user;



        if ($user_id) {
            try {
                $user_data = ORM::factory('User', $user_id);
                if ($user_id != $cur_us) {
                    $user_role = $user_data->roles->where('role_id', 'IN', array(4, 5))->find();
                    $user_data->delete();
                }
            } catch (Exception $exc) {
                $this->template->content = Kohana::message('misc', 'database.error_connexion');
            }
        }
        else
            throw new HTTP_Exception_500();
    }

    final public function action_changepass() {
        $this->template->jslib[] = 'jquery.bpopup-0.7.0.min';
        try {
            $this->template->content = View::factory('contents/User/changepass')
                    ->bind('errors', $errors)
                    ->bind('msg_global_err', $msg_global_err)
                    ->bind('msg_global', $msg_global);


            $this->template->content->user = $this->current_user;
            $this->template->content->role = $this->current_user_role->description;
        } catch (Exception $exc) {

            $this->template->preJSAction = 'alert("' . Kohana::message('misc', 'misc.error') . $exc->getMessage() . '");';
        }
    }

    final public function action_modifypass() {
        $this->template->content = View::factory('contents/User/changepass')
                ->bind('errors', $errors)
                ->bind('msg_global_err', $msg_global_err)
                ->bind('msg_global', $msg_global);
        $user = Session::instance()->get('auth_user');
        try {


            if ($user->password == Auth::instance()->hash_password($_POST['oldpassword'])) {
                if ($_POST['password'] != $_POST['password_confirm']) {
                    $msg_global_err = Kohana::message('misc', 'changepassword.error_confirmpwd');
                } else {
                    if (strlen($_POST['password']) < 8) {
                        $msg_global_err = Kohana::message('misc', 'changepassword.error_pwdlen');
                    } else {
                        $user->password = $_POST['password'];
                        $user->save();
                        $msg_global = Kohana::message('misc', 'changepassword.modif_ok');
                    }
                }
            } else {
                $msg_global_err = Kohana::message('misc', 'changepassword.error_pwd');
            }
        } catch (ORM_Validation_Exception $e) {
            $msg_global_err = 'Erreur(s) lors du traitement';
            $errors = $e->errors('models');
        }
    }

    final public function action_etape() {

        $cur_role = $this->current_user_role;
        $vw = View::factory('contents/User/etape');
        $vw->bind('liste_etape', $etp);
        $this->template->content = $vw;
        $sql = "
			SELECT 
				projet_id
			FROM projet_user
			WHERE user_id = " . $this->current_user->id . "
		";
        $rs_prj = DB::query(Database::SELECT, $sql)->execute()->as_array();

        if (($cur_role == "2") || ($cur_role == "4")) {
            $proj = ORM::factory("Projet")
                    ->find_all()
                    ->as_array('projet_id', 'nom_projet');
            if ($cur_role == "2") {
                $users = DB::select(
                                'users.id', 'users.username'
                        )
                        ->from('users')
                        ->join('roles_users')
                        ->on('users.id', '=', 'roles_users.user_id')
                        ->join('roles')
                        ->on('roles.id', '=', 'roles_users.role_id')
                        ->where('roles.id', '!=', '1')
                        ->execute()
                        ->as_array('id', 'username')
                ;
            } else {
                $users = DB::select(
                                'users.id', 'users.username'
                        )
                        ->from('users')
                        ->join('roles_users')
                        ->on('users.id', '=', 'roles_users.user_id')
                        ->join('roles')
                        ->on('roles.id', '=', 'roles_users.role_id')
                        ->where('roles.name', 'like', 'fthm_%')
                        ->execute()
                        ->as_array('id', 'username')
                ;
            }
        } else {
            $proj = ORM::factory("Projet")
                    ->where('projet_id', 'in', $rs_prj)
                    ->find_all()
                    ->as_array('projet_id', 'nom_projet');
        }
        $this->template->content->tb_proj = $proj;
        $this->template->content->tb_user = $users;
    }

    public function action_ajax_changestep() {
		$cur_role = $this->current_user_role;
		$where_else = " ";
		if ($cur_role=="4") {$where_else = " and e.defaut=1 ";}
		
        if (HTTP_Request::POST == $this->request->method()) {

            $postData = $this->request->post();

            $projet_id = $postData["proj_id"];
            $user_id = $postData["ut_id"];
            $sql = "
				SELECT 	
					ep.etape_projet_id etape_id
					,e.libelle
					, CASE WHEN uep.user_etape_projet_id IS NULL THEN 'n' ELSE 'o' END AS selected
				FROM
					projet p
					INNER JOIN etape_projet ep
						ON p.projet_id = ep.projet_id
					INNER JOIN etape e
						ON e.etape_id = ep.etape_id
					LEFT JOIN (
							SELECT * FROM user_etape_projet  WHERE user_id =" . $user_id . "
						
						)uep
						ON uep.etape_projet_id = ep.etape_projet_id
				WHERE 
					p.projet_id = " . $projet_id . "
					".$where_else."
				ORDER BY 
					p.nom_projet,ep.ordre
			";
            $etapes = DB::query(Database::SELECT, $sql)->execute()->as_array();
            echo json_encode($etapes);
        }
    }

    public function action_ajax_changeuser() {
        $user_id = $this->request->param('id');
        $sql = "
			SELECT	
				p.projet_id
				,p.nom_projet
			FROM
				projet p
				INNER JOIN projet_user pu
					ON p.projet_id = pu.projet_id
			WHERE 
				pu.user_id = " . $user_id . "
		";
        $users = DB::query(Database::SELECT, $sql)->execute()->as_array('projet_id', 'nom_projet');
        echo json_encode($users);
    }

    public function action_ajax_validsteps() {
        if (HTTP_Request::POST == $this->request->method()) {
            $postData = $this->request->post();
            $data_steps = $postData["data_steps"];
            $data_user = $postData["data_user"];
            $data_project = $postData["data_project"];

            if ($data_project == '0') {
                return false;
            }
            if ($data_steps == '') {
                return false;
            }

            $arr_etpi = DB::query(Database::SELECT, "select etape_projet_id from etape_projet where projet_id =" . $data_project)->execute()->as_array();
            $etpi = array();
            foreach ($arr_etpi as $ligne) {
                $sql_delete = "DELETE FROM user_etape_projet WHERE etape_projet_id=" . $ligne["etape_projet_id"] . " AND user_id=" . $data_user;
                DB::query(Database::DELETE, $sql_delete)->execute();
            }
            foreach ($data_steps as $etp_id) {
                $sql_insert = "
					INSERT INTO user_etape_projet
					(etape_projet_id,user_id) VALUES
					(" . $etp_id . "," . $data_user . ")
				";
                DB::query(Database::INSERT, $sql_insert)->execute();
            }
        }
    }

}
