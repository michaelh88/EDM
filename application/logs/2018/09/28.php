<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2018-09-28 10:11:30 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 1 [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 7																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 7																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7) AND termine IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:11:30 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:15:02 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 1 [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 7																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 7																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7) AND termine IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:15:02 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:15:02 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 1 [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 7																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 7																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7) AND termine IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:15:02 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:20:02 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 1 [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 7																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 7																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7) AND termine IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:20:02 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:20:03 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 1 [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 7																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 7																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7) AND termine IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:20:03 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:25:03 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 1 [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 7																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 7																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7) AND termine IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:25:03 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:25:03 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 1 [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 7																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 7																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7) AND termine IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:25:03 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2018-09-28 10:32:16 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13904] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84