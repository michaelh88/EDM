<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-09-29 08:44:45 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11103] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:45:28 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11104] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:45:45 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11105] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:46:00 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11106] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:46:12 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11107] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:46:31 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11108] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:46:32 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11109] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:46:41 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11110] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:46:48 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11111] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:46:50 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11112] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:46:54 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11113] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:47:01 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11114] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:47:07 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11115] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:47:54 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11116] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:48:20 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11117] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:48:50 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11118] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:49:17 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11119] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:49:17 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11120] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:49:40 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11121] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:49:51 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11122] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:50:02 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11123] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:50:34 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11124] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 08:51:10 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11125] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 10:00:27 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11126] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 10:29:40 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 16																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 16																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (8,9,10,11,12,13,14) AND termine IN (0,1)ORDER BY  lot_id asc LIMIT 0,117 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-09-29 10:29:40 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-09-29 11:09:51 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11127] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 11:12:40 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11128] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:04:37 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11129] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:04:43 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11130] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:05:05 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11131] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:05:16 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11132] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:07:45 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11133] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:07:50 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11134] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:07:52 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11135] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:07:55 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11136] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:17:32 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11137] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:17:49 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11138] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:17:53 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11139] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:03 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11140] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:05 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11141] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:30 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11142] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:31 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11143] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:33 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11144] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:34 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11145] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:47 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11146] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:48 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11147] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:50 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11148] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-29 15:18:55 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 11149] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84