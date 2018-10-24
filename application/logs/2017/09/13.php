<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-09-13 10:01:14 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT COUNT(*) as nb,SUM(avancement_globale) as somme FROM (SELECT lot.lot_id,										   lot.nombre_doc,										   lot.datetime_creation,										   commande_vivetic,										   nom_zip,										   nom_zip_original,										   createur_lot,										   datetime_modification,										   modificateur_lot,										   datetime_validation,										   p.nom_projet,										   lot.projet_id,										   av.avancement_globale,										   lot.nombre_doc volume_piece,										   nom_zip_temp,										CASE											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, datetime_debut_max))											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND, lot.datetime_creation, NOW()))										END AS duree_traitement,       										   termine AS termine_id,										   CASE WHEN termine = 0 THEN "Non Terminé" ELSE "Terminé" END AS termine,										   etat,										   nb_notif,										   nb_total_lot,										   nb_notif AS notif									FROM   lot 										   LEFT JOIN projet p												  ON lot.projet_id = p.projet_id										   LEFT JOIN vw_avancement_global av												   ON lot.lot_id = av.lot_id												   										   left join vw_alerte_finale al											on lot.lot_id = al.lot_id 										   LEFT JOIN ( SELECT mes5.lot_id,															  mes5.nb_notif,															  CASE																WHEN nb_total IS NULL THEN 0																ELSE nb_total															  END AS nb_total_lot													   FROM   ( SELECT l.lot_id,																	   CASE																		 WHEN nb IS NULL THEN 0																		 ELSE nb																	   END AS nb_notif																FROM   lot l																	   LEFT JOIN ( SELECT lot_id,																						  COUNT( * ) AS nb																				   FROM   message																						  INNER JOIN message_user																								  ON message.message_id = message_user.message_id																				   WHERE  datetime_lecture IS NULL AND																						  message_user.user_id = 16																				   GROUP  BY lot_id ) t_nb																			  ON l.lot_id = t_nb.lot_id ) mes5															  LEFT JOIN ( SELECT lot_id,																				 COUNT( * ) AS nb_total																		  FROM   message																				 INNER JOIN message_user																						 ON message.message_id = message_user.message_id																		  WHERE  message_user.user_id = 16																		  GROUP  BY lot_id ) mes6																	 ON mes5.lot_id = mes6.lot_id ) nots												  ON lot.lot_id = nots.lot_id							WHERE 1=1  AND lot.projet_id IN (8,9,10,11,12,13,14) AND termine IN (0,1)ORDER BY  lot_id asc) al ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-09-13 10:01:14 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(272): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2017-09-13 10:49:45 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10786] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:50:28 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10787] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:50:31 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10788] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:50:49 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10789] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:51:00 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10790] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:51:02 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10791] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:51:44 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10792] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:51:58 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10793] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:52:37 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10794] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:53:35 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10795] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:53:53 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10796] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:54:35 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10797] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:54:39 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10798] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:54:56 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10799] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:54:58 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10800] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:55:41 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10801] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:56:07 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10802] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:56:14 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10803] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:56:34 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10804] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:57:51 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10805] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:58:31 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10806] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 10:58:53 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 10807] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 13:54:54 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10808] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 13:55:57 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10809] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 13:56:56 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10810] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 13:58:29 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10811] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 13:58:51 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10812] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 13:59:18 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10813] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 13:59:32 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10814] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 13:59:37 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10815] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:33:38 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10816] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:33:40 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10817] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:34:11 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10818] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:34:13 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10819] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:34:14 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10820] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:34:18 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10821] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:51:40 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10822] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:51:41 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10823] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:51:43 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10824] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2017-09-13 15:51:43 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 10825] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84