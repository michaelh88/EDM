<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-10-04 07:31:19 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11283] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 07:31:32 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11284] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 07:32:24 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11285] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 07:33:06 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11286] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 07:33:14 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11287] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 07:33:16 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 11288] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 09:52:50 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 14																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 14																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (7,15,16,17) AND termine IN (0,1)ORDER BY  datetime_creation desc LIMIT 0,72 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-10-04 09:52:50 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-10-04 10:32:33 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11289] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 10:36:37 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11290] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 11:11:59 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11291] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 11:17:42 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11292] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 11:31:53 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11293] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 11:35:22 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11294] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 12:54:57 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11295] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:00:09 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11296] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:04:19 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11297] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:08:32 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11298] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:12:51 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11299] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:17:25 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11300] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:28:34 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11301] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:44:00 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11302] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:47:09 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11303] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:47:49 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11304] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 13:51:50 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11305] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:03:58 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11306] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:11:06 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11307] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:11:37 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11308] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:17:07 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11309] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:19:56 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11310] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:27:17 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11311] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:30:14 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11312] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:39:48 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11313] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:41:26 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11314] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:44:17 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 16																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 16																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (8,9,10,11,12,13,14) AND termine IN (0,1)ORDER BY  lot_id asc LIMIT 0,117 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-10-04 14:44:17 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT lot.lot_...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(270): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-10-04 14:45:08 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11315] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 14:50:18 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11316] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 15:01:12 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11317] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 15:06:39 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11318] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 15:22:24 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11319] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-10-04 15:24:11 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 11320] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84