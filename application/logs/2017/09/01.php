<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-09-01 13:13:06 --- EMERGENCY: Database_Exception [ 1052 ]: Column 'datetime_creation' in where clause is ambiguous [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 14																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 14																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7,15,16,17)  AND datetime_creation >= '2017-08-28'  AND datetime_creation  ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-09-01 13:13:06 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-09-01 13:13:08 --- EMERGENCY: Database_Exception [ 1052 ]: Column 'datetime_creation' in where clause is ambiguous [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 14																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 14																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7,15,16,17)  AND datetime_creation >= '2017-08-28'  AND datetime_creation  ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-09-01 13:13:08 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-09-01 13:30:54 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10283] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:31:00 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10284] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:31:16 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10285] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:31:32 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10286] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:31:42 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10287] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:36:19 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10288] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:39:03 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10289] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:44:18 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10290] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:44:22 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10291] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:44:24 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10292] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:44:47 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10293] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:44:49 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10294] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:44:50 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10295] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:44:53 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10296] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:45:07 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10297] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:45:14 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10298] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:45:15 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10299] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:45:30 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10300] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:45:33 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10301] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:45:34 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10302] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:47:17 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10303] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 13:54:05 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10304] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:12:13 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10305] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:17:57 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10306] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:24:40 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10307] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:30:10 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10308] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:38:11 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10309] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:38:25 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10310] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:40:30 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10311] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:43:05 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10312] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:45:28 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10313] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 14:50:42 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10314] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 15:24:34 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10315] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 15:27:25 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10316] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 15:30:51 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10317] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-01 15:35:36 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 10318] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84