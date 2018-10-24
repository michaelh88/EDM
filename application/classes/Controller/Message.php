<?php

defined('SYSPATH') or die('No direct script access.');

final class Controller_Message extends Controller_Website {

    final public function action_info() {   
    }

    final public function action_list() {
    }

    final public function action_ajax_browse() {
        $role_act = $this->current_user_role;        
        $id_user = $this->current_user->id;
        try {
            if ($_REQUEST) {
                $lot_id = $_REQUEST['lot_id'];
				$aColumns = array('message_user_id',
					'objet',
					'datetime_creation',
					'createur_id',
					'etat',
					'');
				/*tri*/
				if (isset($_REQUEST['iSortCol_0'])) {
					$sOrder = "ORDER BY  ";
					for ($i = 0; $i < intval($_REQUEST['iSortingCols']); $i++) {
						if ($_REQUEST['bSortable_' . intval($_REQUEST['iSortCol_' . $i])] == "true") {
							$sOrder .= $aColumns[intval($_REQUEST['iSortCol_' . $i])] . " " 
							. mysqli_real_escape_string(Database_MySQLi::$_last_connection_handle, $_REQUEST['sSortDir_' . $i]) . ", ";
						}
					}

					$sOrder = substr_replace($sOrder, "", -2);
					if ($sOrder == "ORDER BY") {
						$sOrder = "";
					}
				}
                /* formatage date */
                $clTzSec = Session::instance()->get('clTzSec');
				$origin_dtz = new DateTimeZone('Europe/Paris');
				// $origin_dtz = new DateTimeZone('Indian/Antananarivo');
				$origin_dt = new DateTime("now", $origin_dtz);
				$svTzSec = $origin_dtz->getOffset($origin_dt);
				$Interval = $clTzSec - $svTzSec;
				
                $clTzSecDI = DateInterval::createFromDateString($Interval . ' seconds');
                $utcTz = new DateTimezone('UTC');
				/* fin */
				
				
                if ($role_act && $lot_id != NULL) {
                    $data = array();
                    //recuperation des messages
                    $sqlmessage = 'SELECT
										tab1.*
										,tab2.lupar
									FROM
										(
											SELECT 
												t1.message_user_id message_user_id,
												t1.user_id user_id,
												t1.message_id,
												t1.datetime_lecture,
												t1.datetime_creation,
												users.email createur_id,
												t1.lot_id,
												t1.objet,
												t1.texte_message,
												t1.etat 
											FROM (SELECT 
													mu.message_user_id message_user_id,
													mu.user_id user_id,
													mu.message_id,
													mu.datetime_lecture,
													m.datetime_creation,
													m.user_id createur_id,
													m.lot_id,
													m.objet,
													m.texte_message,
													CASE 
														WHEN mu.datetime_lecture IS NULL THEN "Non Lu"
														ELSE "Lu" END as etat  
												FROM message_user mu,message m
												WHERE 1=1 and mu.message_id = m.message_id
												and lot_id = '.$lot_id.' and mu.user_id = '.$id_user.' ) t1 
											INNER JOIN users ON t1.createur_id = users.id
										) tab1
									LEFT JOIN 
										(
											SELECT
											 m.message_id
											 ,CASE WHEN mu.datetime_lecture IS NULL THEN "NON LU" ELSE "LU" END AS etat
											 ,UPPER( GROUP_CONCAT(CONCAT (" ",u.userlastname," ", u.userfirstname))) AS lupar
											FROM 
											 message m
											 INNER JOIN message_user mu
											  ON m.message_id = mu.message_id
											 INNER JOIN users u
											  ON mu.user_id = u.id

											GROUP BY m.message_id , etat
											ORDER BY m.message_id
										) tab2
									ON tab1.message_id = tab2.message_id AND tab2.etat = "Lu"
									WHERE 1=1 '.$sOrder;
                    $data_message = DB::query(Database::SELECT, $sqlmessage)->execute();
                    $reqTotal = 'SELECT COUNT(*) as nb FROM (' . $sqlmessage . ') al';
                    $countMessage = DB::query(Database::SELECT, $reqTotal)->execute();
                    $temp = array();
					
					
					
                    foreach ($data_message as $m) {
                        if ($m['datetime_lecture'] != null) {
							$dateCreationDT = new DateTime($m['datetime_lecture'], $utcTz);
							$dateCreationDT->add($clTzSecDI);
							$m['datetime_lecture'] = $dateCreationDT->format('d/m/Y H:i:s');
						}
						if ($m['datetime_creation'] != null) {
							$dateCreationDT = new DateTime($m['datetime_creation'], $utcTz);    
							$dateCreationDT->add($clTzSecDI);
							$m['datetime_creation'] = $dateCreationDT->format('d/m/Y H:i:s');
						}
                        $temp[] = $m;
                    }
                    /* JSON encode */
                    $render = json_encode(array
                        (
                        'sEcho' => intval($_REQUEST["sEcho"]),
                        'iTotalRecords' => intval($countMessage[0]["nb"]),
                        'aaData' => $temp
                            ));
                    $this->response->body($render);
                }
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
    }
	/*
	*	Création d'un message
	*/
	final public function action_ajax_create_message() {
	$tvalidation = array(
                'status' => '0',
                'message' => '',
            );
		try {
			$id_user = $this->current_user->id;
			
            if (HTTP_Request::POST == $this->request->method()) {
				$postData = $this->request->post();
				$isInsert = empty($postData['lot_id']);
				
                $lot_id = $postData['lot_id'];
				$users = $postData['users'];
				
				$message = ORM::factory('Message');
				$message->lot_id = $postData['lot_id'];
				$message->objet = $postData['objet'];
				$message->texte_message = $postData['texte'];
				$message->user_id = $id_user;
                if (!$isInsert) {
					if(gettype($users) == "array"){	
						$message->save();
						$users[count($users)] = $id_user;
						foreach ($users as $val) {
							if($val == $id_user){
								$query2 = DB::query(Database::INSERT,"INSERT INTO message_user (user_id,message_id,datetime_lecture)
									VALUES (".$val."," .intval($message->message_id). ",CURRENT_TIMESTAMP())");
							}else{
								$query2 = DB::query(Database::INSERT,"INSERT INTO message_user (user_id,message_id)
									VALUES (".$val."," .intval($message->message_id). ")");
							}
							
							$query2->execute();
						}
					}else{
						throw new Exception("le destinataire doit être spécifié",6000);
					}
					$action_utilisateur = "Création d'un message pour le lot ".$lot_id;
					$loginfo = "[Utilisateur : ".$this->current_user->username."] [Action : ".$action_utilisateur."]";
					Kohana::$log->add(LOG::INFO, $loginfo);
                }
            } else
                throw new HTTP_Exception_500();
        }catch (ORM_Validation_Exception $e) {

			$tvalidation['status'] = 1;

			foreach ($e->errors('models') as $field_name => $err_msg) {

				if ($field_name == 'lot_id') {

					$tvalidation['status'] = 2;
					$tvalidation['message'] = $err_msg;
					break;
				}
				if ($field_name == 'objet') {

					$tvalidation['status'] = 3;
					$tvalidation['message'] = $err_msg;
					break;
				} elseif ($field_name == 'texte_message') {

					$tvalidation['status'] = 4;
					$tvalidation['message'] = $err_msg;
					break;
				} elseif ($field_name == 'user_id') {

					$tvalidation['status'] = 5;
					$tvalidation['message'] = $err_msg;
					break;
				} elseif ($field_name == '_external') {

					$tvalidation['status'] = 6;
					$tvalidation['message'] = reset($err_msg);
					break;
				}
			}
		} 
		catch (Exception $exc) {
			if($exc->getCode() == 6000){
				$tvalidation['status'] = 1;
				$tvalidation['message'] = $exc->getMessage();
			}else{
				$this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
			}
        }
		$this->response->body(json_encode($tvalidation));
	}
	/*
	*	mise à jour état d'un message
	*/
	final public function action_ajax_update_etat() {
		try {
            if (HTTP_Request::POST == $this->request->method()) {
				$postData = $this->request->post();
				$isInsert = empty($postData['message_user_id']);
				
                $message_user_id = $postData['message_user_id'];
				$lot_id = $postData['lot_id'];
                if (!$isInsert) {
					DB::query(Database::UPDATE,"UPDATE `message_user` SET `datetime_lecture` = CURRENT_TIMESTAMP() WHERE `message_user_id` =".$message_user_id)->execute();
					$action_utilisateur = "Mise à jour de l'état du message (lu) pour le lot ".$lot_id;
					$loginfo = "[Utilisateur : ".$this->current_user->username."] [Action : ".$action_utilisateur."]";
					Kohana::$log->add(LOG::INFO, $loginfo);
                }
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
	}
	final public function action_ajax_get_message() {
		try {
            if (HTTP_Request::POST == $this->request->method()) {
				$postData = $this->request->post();
				$isInsert = empty($postData['message_user_id']);
				
                $message_user_id = $postData['message_user_id'];
                if (!$isInsert) {
					$query = "
						SELECT
							lot_id
							,objet
							,texte_message
							,user_id 
						FROM
							message m
						INNER JOIN
							(SELECT
								message_id,
								message_user_id
							FROM message_user
							WHERE message_user_id = ".$message_user_id.") mu
						ON 
							m.message_id = mu.message_id";
					$req = DB::query(Database::SELECT, $query)->execute()->as_array();
					$this->response->body(json_encode($req));
                }
            } else
                throw new HTTP_Exception_500();
        } catch (Exception $exc) {
            $this->response->body(Kohana::message('misc', 'database.error_connexion') . ' - ' . $exc->getMessage());
        }
	}
}
