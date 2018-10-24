<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-12-06 06:31:16 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4792] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 06:32:30 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4793] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 06:32:40 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4794] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 06:32:49 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4795] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 06:32:57 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4796] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 06:33:03 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4797] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 06:33:14 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4798] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 06:33:33 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4799] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 07:48:17 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4800] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 07:48:39 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4801] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 07:49:27 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4802] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 07:49:38 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4803] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 07:49:53 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4804] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 07:50:30 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4805] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 07:51:36 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4806] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 08:17:23 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4807] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 08:17:55 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4808] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 08:18:00 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4809] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 08:18:08 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4810] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 08:18:12 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4811] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 09:31:45 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT COUNT(*) as nb,SUM(avancement_globale) as somme FROM (SELECT
								lot.lot_id,
								nombre_doc,
								datetime_creation,
								commande_vivetic,
								nom_zip,
								nom_zip_original,
								createur_lot,
								datetime_modification,
								modificateur_lot,
								datetime_validation,
								nom_projet,
								projet_id,
								avancement_globale,
								CASE WHEN volume_piece = 0 THEN nombre_doc ELSE volume_piece END AS volume_piece,
								nom_zip_temp,
								duree_traitement,
								termine_id,
								lot.termine,
								etat,
								nb_notif,
								nb_total_lot,
								nb_notif notif
							FROM
							(
								SELECT
									lot_final.lot_id,
									lot_final.nombre_doc,
									lot_final.datetime_creation,
									lot_final.commande_vivetic,
									lot_final.nom_zip,
									lot_final.nom_zip_original,
									lot_final.createur createur_lot,
									lot_final.datetime_modification,
									lot_final.modificateur modificateur_lot,
									lot_final.datetime_validation,
									lot_final.nom_projet,
									lot_final.projet_id,
									lot_final.avancement_globale,
									lot_final.nom_zip_temp,
									lot_final.duree_traitement,
									lot_final.termine_id,
									lot_final.termine,
									t4.nb_notif,
									t4.nb_total_lot,
									t4.nb_notif notif
								FROM
									(SELECT
										l.lot_id lot_id,
										nombre_doc,
										l.datetime_creation datetime_creation,
										commande_vivetic,
										nom_zip,
										nom_zip_original,
										createur,
										datetime_modification,
										modificateur,
										datetime_validation,
										p.nom_projet nom_projet,
										p.projet_id projet_id,
										avancement_globale,
										nom_zip_temp,
										CASE
											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																datetime_debut_max))
											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																now()))
										END AS duree_traitement,

										termine termine_id,
										CASE
											WHEN termine = 0 THEN "Non Terminé"
											ELSE "Terminé"
										END as termine
									FROM
										(
											SELECT
												lot1.*, u.username modificateur
											FROM
												(
													SELECT
														l.*, u.username createur
													FROM
														(SELECT
															*
														FROM
															lot) l
													LEFT JOIN
														(SELECT
															id, username
														FROM
															users) u
													ON l.createur_lot = u.id
												)  lot1
											LEFT JOIN
												(SELECT
													id, username
												FROM
													users
												) u
											ON lot1.modificateur_lot = u.id
										) l
									LEFT JOIN
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
													SUM(volume_doc) volume_doc
												FROM
													(SELECT
														hl2.lot_id,

														hl2.volume_doc*100 as volume_doc,
														ep.etape_id
													FROM
														(
														SELECT
															*
														FROM
															historique_lot
														WHERE historique_lot_id IN	(
																			SELECT 	
																				MAX(historique_lot_id)
																			FROM 
																				historique_lot
																			GROUP BY lot_id, etape_projet_id
																		)
														) hl2,
														etape_projet ep,
														lot l
													WHERE
														ep.etape_projet_id = hl2.etape_projet_id
														AND ep.projet_id = l.projet_id
													GROUP BY
														hl2.lot_id,
														ep.etape_id) t
												GROUP BY lot_id
												) t1,
												(SELECT
													COUNT(*) nb_etape,
													lot_id,
													nombre_doc
												FROM
													etape_projet,
													lot
												WHERE
													etape_projet.projet_id = lot.projet_id
													AND lot.lot_id in (
																		SELECT
																			lot_id
																		FROM
																			lot   )
												GROUP BY lot.lot_id
												) t2,
												(SELECT
													lot_id,
													max(datetime_debut_max) as datetime_debut_max,
													max(t.delai)*60 as delai
												FROM
													(SELECT
														hl.lot_id,
														ep.delai,
														ep.ordre,
														MAX(hl.datetime_debut) datetime_debut_max,
														MAX(hl.datetime_fin) datetime_fin_max
													FROM
														etape_projet ep,
														historique_lot hl
													WHERE
														hl.etape_projet_id = ep.etape_projet_id
													GROUP BY
														ep.etape_id, hl.lot_id
													ORDER BY
														hl.lot_id, ep.ordre
													) t
												GROUP BY t.lot_id
												) t3
											WHERE
												t1.lot_id = t2.lot_id
												AND t1.lot_id = t3.lot_id
												AND                          t1.lot_id = l.lot_id
											GROUP BY t1.lot_id
										) req
									ON l.lot_id = req.lot_id
									INNER JOIN
										projet p
									ON l.projet_id = p.projet_id
									) lot_final
								LEFT JOIN
									(
										SELECT
											mes5.lot_id, mes5.nb_notif,
											CASE
												WHEN nb_total IS NULL THEN 0
												ELSE nb_total
											END as nb_total_lot
										FROM
										(
											SELECT
												l.lot_id,
												CASE
													WHEN nb IS NULL THEN 0
													ELSE nb
												END as nb_notif
											FROM
												lot l
											LEFT JOIN
												(
													SELECT
														lot_id,
														COUNT(*) AS nb
													FROM
														message
													INNER JOIN
														message_user
															ON message.message_id = message_user.message_id
													WHERE
														datetime_lecture IS NULL
														AND message_user.user_id=  16
													GROUP BY
														lot_id
												) t_nb
													ON l.lot_id =t_nb.lot_id
											) mes5
										LEFT JOIN
											(
												SELECT
													lot_id,
													COUNT(*) AS nb_total
												FROM
													message
												INNER JOIN
													message_user
														ON message.message_id = message_user.message_id
												WHERE
													message_user.user_id=   16
												GROUP BY
													lot_id
											) mes6
										ON mes5.lot_id = mes6.lot_id
									)   t4
								ON lot_final.lot_id = t4.lot_id
							) lot
							LEFT JOIN
							(
								SELECT
									lot_id,
									termine ,
									CASE
										WHEN termine = 1 THEN "Terminé"
										WHEN (SELECT LOCATE( "Alerte", statut )) > 0 THEN "Alerte délai"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is not null THEN "En cours"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is null THEN "Créé"
										ELSE "En cours"
									END AS etat
								FROM
								(
									SELECT
										lot_id,
										datetime_creation,
										projet_id,
										nom_zip,
										termine ,
										MIN(compare_fin) compare_fin,
										GROUP_CONCAT( statut SEPARATOR "," ) statut
										,MIN(debut) debut
									FROM
									(
										SELECT
											lot_id,
											datetime_creation,
											projet_id,
											nom_zip,
											termine ,
											etape_projet_id,
											etape_id,
											delai,
											deadline_etape,
											compare_fin,
											CASE 	WHEN compare_fin < now() THEN "OK"
													WHEN compare_fin >= now() AND TIME_TO_SEC(TIMEDIFF(deadline_etape,compare_fin)) < 0 THEN "Alerte"
													ELSE "OK" END statut
											,debut
										FROM
										(
										
										
										
										
											SELECT
														ddl.lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														ddl.etape_projet_id,
														etape_id,
														delai,
														deadline_etape,
														CASE WHEN fin IS NULL THEN NOW() ELSE fin END compare_fin
														,hl.debut
											FROM
											(
												SELECT
														lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														dl.etape_projet_id,
														etape_id,
														delai,
													ADDDATE(datetime_creation , INTERVAL delai HOUR) deadline_etape
												FROM
												(
													SELECT
														l.lot_id,
														l.datetime_creation,
														l.projet_id,
														l.nom_zip,
														l.termine ,
														ep.etape_projet_id,
														ep.etape_id,
														ep.delai
													FROM
														lot l
														INNER JOIN etape_projet ep
															ON l.projet_id = ep.projet_id
													#WHERE l.projet_id = 1
													ORDER BY l.lot_id , ep.etape_id
												)dl
											) ddl
											LEFT JOIN (
												SELECT
													lot_id,
													etape_projet_id,
													CASE WHEN MAX(datetime_fin) IS NULL THEN NOW() ELSE MAX(datetime_fin) END fin
													,CASE WHEN MAX(datetime_debut) IS NULL THEN NOW() ELSE MAX(datetime_debut) END debut
												FROM
													historique_lot
												GROUP BY
													lot_id,
													etape_projet_id

											) hl
											ON ddl.lot_id = hl.lot_id AND ddl.etape_projet_id = hl.etape_projet_id
											
											
											
											
										) tba
									) tab2
									GROUP BY lot_id
								) final_etat
							) etat_final
							ON lot.lot_id = etat_final.lot_id
							LEFT JOIN
							(
								SELECT 
									lot.lot_id,CASE WHEN table2.volume_piece IS NULL THEN 0 ELSE  table2.volume_piece END volume_piece
								FROM 
									lot
								LEFT JOIN 
								(
									  SELECT
										historique_lot.lot_id,historique_lot.volume_piece,table1.libelle
									  FROM
										historique_lot
									  JOIN
										(
											SELECT 
												max(historique_lot_id) historique_lot_id,etape.defaut,etape_projet.ordre,etape.libelle
											FROM 
												historique_lot,etape_projet,etape
											WHERE historique_lot.etape_projet_id = etape_projet.etape_projet_id  AND etape.etape_id = etape_projet.etape_id AND etape.defaut = 0
											GROUP BY historique_lot.etape_projet_id,lot_id
											ORDER BY lot_id,historique_lot.etape_projet_id,etape_projet.ordre
										) table1
									  ON 
										historique_lot.historique_lot_id = table1.historique_lot_id
									  GROUP BY historique_lot.lot_id
								) table2
								ON
								 lot.lot_id = table2.lot_id
							) table3
							ON lot.lot_id = table3.lot_id
							WHERE 1=1  AND projet_id IN (8,9,10,11,12,13,14)  AND lot.projet_id IN (9)  AND lot.lot_id IN (4122,4123,4124,4125,4126,4127,4128) AND termine_id IN (0,1)ORDER BY  lot_id asc) al ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 09:31:45 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(667): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 10:09:40 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT COUNT(*) as nb,SUM(avancement_globale) as somme FROM (SELECT
								lot.lot_id,
								nombre_doc,
								datetime_creation,
								commande_vivetic,
								nom_zip,
								nom_zip_original,
								createur_lot,
								datetime_modification,
								modificateur_lot,
								datetime_validation,
								nom_projet,
								projet_id,
								avancement_globale,
								CASE WHEN volume_piece = 0 THEN nombre_doc ELSE volume_piece END AS volume_piece,
								nom_zip_temp,
								duree_traitement,
								termine_id,
								lot.termine,
								etat,
								nb_notif,
								nb_total_lot,
								nb_notif notif
							FROM
							(
								SELECT
									lot_final.lot_id,
									lot_final.nombre_doc,
									lot_final.datetime_creation,
									lot_final.commande_vivetic,
									lot_final.nom_zip,
									lot_final.nom_zip_original,
									lot_final.createur createur_lot,
									lot_final.datetime_modification,
									lot_final.modificateur modificateur_lot,
									lot_final.datetime_validation,
									lot_final.nom_projet,
									lot_final.projet_id,
									lot_final.avancement_globale,
									lot_final.nom_zip_temp,
									lot_final.duree_traitement,
									lot_final.termine_id,
									lot_final.termine,
									t4.nb_notif,
									t4.nb_total_lot,
									t4.nb_notif notif
								FROM
									(SELECT
										l.lot_id lot_id,
										nombre_doc,
										l.datetime_creation datetime_creation,
										commande_vivetic,
										nom_zip,
										nom_zip_original,
										createur,
										datetime_modification,
										modificateur,
										datetime_validation,
										p.nom_projet nom_projet,
										p.projet_id projet_id,
										avancement_globale,
										nom_zip_temp,
										CASE
											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																datetime_debut_max))
											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																now()))
										END AS duree_traitement,

										termine termine_id,
										CASE
											WHEN termine = 0 THEN "Non Terminé"
											ELSE "Terminé"
										END as termine
									FROM
										(
											SELECT
												lot1.*, u.username modificateur
											FROM
												(
													SELECT
														l.*, u.username createur
													FROM
														(SELECT
															*
														FROM
															lot) l
													LEFT JOIN
														(SELECT
															id, username
														FROM
															users) u
													ON l.createur_lot = u.id
												)  lot1
											LEFT JOIN
												(SELECT
													id, username
												FROM
													users
												) u
											ON lot1.modificateur_lot = u.id
										) l
									LEFT JOIN
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
													SUM(volume_doc) volume_doc
												FROM
													(SELECT
														hl2.lot_id,

														hl2.volume_doc*100 as volume_doc,
														ep.etape_id
													FROM
														(
														SELECT
															*
														FROM
															historique_lot
														WHERE historique_lot_id IN	(
																			SELECT 	
																				MAX(historique_lot_id)
																			FROM 
																				historique_lot
																			GROUP BY lot_id, etape_projet_id
																		)
														) hl2,
														etape_projet ep,
														lot l
													WHERE
														ep.etape_projet_id = hl2.etape_projet_id
														AND ep.projet_id = l.projet_id
													GROUP BY
														hl2.lot_id,
														ep.etape_id) t
												GROUP BY lot_id
												) t1,
												(SELECT
													COUNT(*) nb_etape,
													lot_id,
													nombre_doc
												FROM
													etape_projet,
													lot
												WHERE
													etape_projet.projet_id = lot.projet_id
													AND lot.lot_id in (
																		SELECT
																			lot_id
																		FROM
																			lot   )
												GROUP BY lot.lot_id
												) t2,
												(SELECT
													lot_id,
													max(datetime_debut_max) as datetime_debut_max,
													max(t.delai)*60 as delai
												FROM
													(SELECT
														hl.lot_id,
														ep.delai,
														ep.ordre,
														MAX(hl.datetime_debut) datetime_debut_max,
														MAX(hl.datetime_fin) datetime_fin_max
													FROM
														etape_projet ep,
														historique_lot hl
													WHERE
														hl.etape_projet_id = ep.etape_projet_id
													GROUP BY
														ep.etape_id, hl.lot_id
													ORDER BY
														hl.lot_id, ep.ordre
													) t
												GROUP BY t.lot_id
												) t3
											WHERE
												t1.lot_id = t2.lot_id
												AND t1.lot_id = t3.lot_id
												AND                          t1.lot_id = l.lot_id
											GROUP BY t1.lot_id
										) req
									ON l.lot_id = req.lot_id
									INNER JOIN
										projet p
									ON l.projet_id = p.projet_id
									) lot_final
								LEFT JOIN
									(
										SELECT
											mes5.lot_id, mes5.nb_notif,
											CASE
												WHEN nb_total IS NULL THEN 0
												ELSE nb_total
											END as nb_total_lot
										FROM
										(
											SELECT
												l.lot_id,
												CASE
													WHEN nb IS NULL THEN 0
													ELSE nb
												END as nb_notif
											FROM
												lot l
											LEFT JOIN
												(
													SELECT
														lot_id,
														COUNT(*) AS nb
													FROM
														message
													INNER JOIN
														message_user
															ON message.message_id = message_user.message_id
													WHERE
														datetime_lecture IS NULL
														AND message_user.user_id=  16
													GROUP BY
														lot_id
												) t_nb
													ON l.lot_id =t_nb.lot_id
											) mes5
										LEFT JOIN
											(
												SELECT
													lot_id,
													COUNT(*) AS nb_total
												FROM
													message
												INNER JOIN
													message_user
														ON message.message_id = message_user.message_id
												WHERE
													message_user.user_id=   16
												GROUP BY
													lot_id
											) mes6
										ON mes5.lot_id = mes6.lot_id
									)   t4
								ON lot_final.lot_id = t4.lot_id
							) lot
							LEFT JOIN
							(
								SELECT
									lot_id,
									termine ,
									CASE
										WHEN termine = 1 THEN "Terminé"
										WHEN (SELECT LOCATE( "Alerte", statut )) > 0 THEN "Alerte délai"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is not null THEN "En cours"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is null THEN "Créé"
										ELSE "En cours"
									END AS etat
								FROM
								(
									SELECT
										lot_id,
										datetime_creation,
										projet_id,
										nom_zip,
										termine ,
										MIN(compare_fin) compare_fin,
										GROUP_CONCAT( statut SEPARATOR "," ) statut
										,MIN(debut) debut
									FROM
									(
										SELECT
											lot_id,
											datetime_creation,
											projet_id,
											nom_zip,
											termine ,
											etape_projet_id,
											etape_id,
											delai,
											deadline_etape,
											compare_fin,
											CASE 	WHEN compare_fin < now() THEN "OK"
													WHEN compare_fin >= now() AND TIME_TO_SEC(TIMEDIFF(deadline_etape,compare_fin)) < 0 THEN "Alerte"
													ELSE "OK" END statut
											,debut
										FROM
										(
										
										
										
										
											SELECT
														ddl.lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														ddl.etape_projet_id,
														etape_id,
														delai,
														deadline_etape,
														CASE WHEN fin IS NULL THEN NOW() ELSE fin END compare_fin
														,hl.debut
											FROM
											(
												SELECT
														lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														dl.etape_projet_id,
														etape_id,
														delai,
													ADDDATE(datetime_creation , INTERVAL delai HOUR) deadline_etape
												FROM
												(
													SELECT
														l.lot_id,
														l.datetime_creation,
														l.projet_id,
														l.nom_zip,
														l.termine ,
														ep.etape_projet_id,
														ep.etape_id,
														ep.delai
													FROM
														lot l
														INNER JOIN etape_projet ep
															ON l.projet_id = ep.projet_id
													#WHERE l.projet_id = 1
													ORDER BY l.lot_id , ep.etape_id
												)dl
											) ddl
											LEFT JOIN (
												SELECT
													lot_id,
													etape_projet_id,
													CASE WHEN MAX(datetime_fin) IS NULL THEN NOW() ELSE MAX(datetime_fin) END fin
													,CASE WHEN MAX(datetime_debut) IS NULL THEN NOW() ELSE MAX(datetime_debut) END debut
												FROM
													historique_lot
												GROUP BY
													lot_id,
													etape_projet_id

											) hl
											ON ddl.lot_id = hl.lot_id AND ddl.etape_projet_id = hl.etape_projet_id
											
											
											
											
										) tba
									) tab2
									GROUP BY lot_id
								) final_etat
							) etat_final
							ON lot.lot_id = etat_final.lot_id
							LEFT JOIN
							(
								SELECT 
									lot.lot_id,CASE WHEN table2.volume_piece IS NULL THEN 0 ELSE  table2.volume_piece END volume_piece
								FROM 
									lot
								LEFT JOIN 
								(
									  SELECT
										historique_lot.lot_id,historique_lot.volume_piece,table1.libelle
									  FROM
										historique_lot
									  JOIN
										(
											SELECT 
												max(historique_lot_id) historique_lot_id,etape.defaut,etape_projet.ordre,etape.libelle
											FROM 
												historique_lot,etape_projet,etape
											WHERE historique_lot.etape_projet_id = etape_projet.etape_projet_id  AND etape.etape_id = etape_projet.etape_id AND etape.defaut = 0
											GROUP BY historique_lot.etape_projet_id,lot_id
											ORDER BY lot_id,historique_lot.etape_projet_id,etape_projet.ordre
										) table1
									  ON 
										historique_lot.historique_lot_id = table1.historique_lot_id
									  GROUP BY historique_lot.lot_id
								) table2
								ON
								 lot.lot_id = table2.lot_id
							) table3
							ON lot.lot_id = table3.lot_id
							WHERE 1=1  AND projet_id IN (8,9,10,11,12,13,14)  AND lot.projet_id IN (9)  AND lot.lot_id IN (4122,4123,4124,4125,4126,4127,4128) AND termine_id IN (0,1)ORDER BY  lot_id asc) al ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 10:09:40 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(667): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 10:10:05 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT
								lot.lot_id,
								nombre_doc,
								datetime_creation,
								commande_vivetic,
								nom_zip,
								nom_zip_original,
								createur_lot,
								datetime_modification,
								modificateur_lot,
								datetime_validation,
								nom_projet,
								projet_id,
								avancement_globale,
								CASE WHEN volume_piece = 0 THEN nombre_doc ELSE volume_piece END AS volume_piece,
								nom_zip_temp,
								duree_traitement,
								termine_id,
								lot.termine,
								etat,
								nb_notif,
								nb_total_lot,
								nb_notif notif
							FROM
							(
								SELECT
									lot_final.lot_id,
									lot_final.nombre_doc,
									lot_final.datetime_creation,
									lot_final.commande_vivetic,
									lot_final.nom_zip,
									lot_final.nom_zip_original,
									lot_final.createur createur_lot,
									lot_final.datetime_modification,
									lot_final.modificateur modificateur_lot,
									lot_final.datetime_validation,
									lot_final.nom_projet,
									lot_final.projet_id,
									lot_final.avancement_globale,
									lot_final.nom_zip_temp,
									lot_final.duree_traitement,
									lot_final.termine_id,
									lot_final.termine,
									t4.nb_notif,
									t4.nb_total_lot,
									t4.nb_notif notif
								FROM
									(SELECT
										l.lot_id lot_id,
										nombre_doc,
										l.datetime_creation datetime_creation,
										commande_vivetic,
										nom_zip,
										nom_zip_original,
										createur,
										datetime_modification,
										modificateur,
										datetime_validation,
										p.nom_projet nom_projet,
										p.projet_id projet_id,
										avancement_globale,
										nom_zip_temp,
										CASE
											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																datetime_debut_max))
											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																now()))
										END AS duree_traitement,

										termine termine_id,
										CASE
											WHEN termine = 0 THEN "Non Terminé"
											ELSE "Terminé"
										END as termine
									FROM
										(
											SELECT
												lot1.*, u.username modificateur
											FROM
												(
													SELECT
														l.*, u.username createur
													FROM
														(SELECT
															*
														FROM
															lot) l
													LEFT JOIN
														(SELECT
															id, username
														FROM
															users) u
													ON l.createur_lot = u.id
												)  lot1
											LEFT JOIN
												(SELECT
													id, username
												FROM
													users
												) u
											ON lot1.modificateur_lot = u.id
										) l
									LEFT JOIN
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
													SUM(volume_doc) volume_doc
												FROM
													(SELECT
														hl2.lot_id,

														hl2.volume_doc*100 as volume_doc,
														ep.etape_id
													FROM
														(
														SELECT
															*
														FROM
															historique_lot
														WHERE historique_lot_id IN	(
																			SELECT 	
																				MAX(historique_lot_id)
																			FROM 
																				historique_lot
																			GROUP BY lot_id, etape_projet_id
																		)
														) hl2,
														etape_projet ep,
														lot l
													WHERE
														ep.etape_projet_id = hl2.etape_projet_id
														AND ep.projet_id = l.projet_id
													GROUP BY
														hl2.lot_id,
														ep.etape_id) t
												GROUP BY lot_id
												) t1,
												(SELECT
													COUNT(*) nb_etape,
													lot_id,
													nombre_doc
												FROM
													etape_projet,
													lot
												WHERE
													etape_projet.projet_id = lot.projet_id
													AND lot.lot_id in (
																		SELECT
																			lot_id
																		FROM
																			lot   )
												GROUP BY lot.lot_id
												) t2,
												(SELECT
													lot_id,
													max(datetime_debut_max) as datetime_debut_max,
													max(t.delai)*60 as delai
												FROM
													(SELECT
														hl.lot_id,
														ep.delai,
														ep.ordre,
														MAX(hl.datetime_debut) datetime_debut_max,
														MAX(hl.datetime_fin) datetime_fin_max
													FROM
														etape_projet ep,
														historique_lot hl
													WHERE
														hl.etape_projet_id = ep.etape_projet_id
													GROUP BY
														ep.etape_id, hl.lot_id
													ORDER BY
														hl.lot_id, ep.ordre
													) t
												GROUP BY t.lot_id
												) t3
											WHERE
												t1.lot_id = t2.lot_id
												AND t1.lot_id = t3.lot_id
												AND                          t1.lot_id = l.lot_id
											GROUP BY t1.lot_id
										) req
									ON l.lot_id = req.lot_id
									INNER JOIN
										projet p
									ON l.projet_id = p.projet_id
									) lot_final
								LEFT JOIN
									(
										SELECT
											mes5.lot_id, mes5.nb_notif,
											CASE
												WHEN nb_total IS NULL THEN 0
												ELSE nb_total
											END as nb_total_lot
										FROM
										(
											SELECT
												l.lot_id,
												CASE
													WHEN nb IS NULL THEN 0
													ELSE nb
												END as nb_notif
											FROM
												lot l
											LEFT JOIN
												(
													SELECT
														lot_id,
														COUNT(*) AS nb
													FROM
														message
													INNER JOIN
														message_user
															ON message.message_id = message_user.message_id
													WHERE
														datetime_lecture IS NULL
														AND message_user.user_id=  16
													GROUP BY
														lot_id
												) t_nb
													ON l.lot_id =t_nb.lot_id
											) mes5
										LEFT JOIN
											(
												SELECT
													lot_id,
													COUNT(*) AS nb_total
												FROM
													message
												INNER JOIN
													message_user
														ON message.message_id = message_user.message_id
												WHERE
													message_user.user_id=   16
												GROUP BY
													lot_id
											) mes6
										ON mes5.lot_id = mes6.lot_id
									)   t4
								ON lot_final.lot_id = t4.lot_id
							) lot
							LEFT JOIN
							(
								SELECT
									lot_id,
									termine ,
									CASE
										WHEN termine = 1 THEN "Terminé"
										WHEN (SELECT LOCATE( "Alerte", statut )) > 0 THEN "Alerte délai"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is not null THEN "En cours"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is null THEN "Créé"
										ELSE "En cours"
									END AS etat
								FROM
								(
									SELECT
										lot_id,
										datetime_creation,
										projet_id,
										nom_zip,
										termine ,
										MIN(compare_fin) compare_fin,
										GROUP_CONCAT( statut SEPARATOR "," ) statut
										,MIN(debut) debut
									FROM
									(
										SELECT
											lot_id,
											datetime_creation,
											projet_id,
											nom_zip,
											termine ,
											etape_projet_id,
											etape_id,
											delai,
											deadline_etape,
											compare_fin,
											CASE 	WHEN compare_fin < now() THEN "OK"
													WHEN compare_fin >= now() AND TIME_TO_SEC(TIMEDIFF(deadline_etape,compare_fin)) < 0 THEN "Alerte"
													ELSE "OK" END statut
											,debut
										FROM
										(
										
										
										
										
											SELECT
														ddl.lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														ddl.etape_projet_id,
														etape_id,
														delai,
														deadline_etape,
														CASE WHEN fin IS NULL THEN NOW() ELSE fin END compare_fin
														,hl.debut
											FROM
											(
												SELECT
														lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														dl.etape_projet_id,
														etape_id,
														delai,
													ADDDATE(datetime_creation , INTERVAL delai HOUR) deadline_etape
												FROM
												(
													SELECT
														l.lot_id,
														l.datetime_creation,
														l.projet_id,
														l.nom_zip,
														l.termine ,
														ep.etape_projet_id,
														ep.etape_id,
														ep.delai
													FROM
														lot l
														INNER JOIN etape_projet ep
															ON l.projet_id = ep.projet_id
													#WHERE l.projet_id = 1
													ORDER BY l.lot_id , ep.etape_id
												)dl
											) ddl
											LEFT JOIN (
												SELECT
													lot_id,
													etape_projet_id,
													CASE WHEN MAX(datetime_fin) IS NULL THEN NOW() ELSE MAX(datetime_fin) END fin
													,CASE WHEN MAX(datetime_debut) IS NULL THEN NOW() ELSE MAX(datetime_debut) END debut
												FROM
													historique_lot
												GROUP BY
													lot_id,
													etape_projet_id

											) hl
											ON ddl.lot_id = hl.lot_id AND ddl.etape_projet_id = hl.etape_projet_id
											
											
											
											
										) tba
									) tab2
									GROUP BY lot_id
								) final_etat
							) etat_final
							ON lot.lot_id = etat_final.lot_id
							LEFT JOIN
							(
								SELECT 
									lot.lot_id,CASE WHEN table2.volume_piece IS NULL THEN 0 ELSE  table2.volume_piece END volume_piece
								FROM 
									lot
								LEFT JOIN 
								(
									  SELECT
										historique_lot.lot_id,historique_lot.volume_piece,table1.libelle
									  FROM
										historique_lot
									  JOIN
										(
											SELECT 
												max(historique_lot_id) historique_lot_id,etape.defaut,etape_projet.ordre,etape.libelle
											FROM 
												historique_lot,etape_projet,etape
											WHERE historique_lot.etape_projet_id = etape_projet.etape_projet_id  AND etape.etape_id = etape_projet.etape_id AND etape.defaut = 0
											GROUP BY historique_lot.etape_projet_id,lot_id
											ORDER BY lot_id,historique_lot.etape_projet_id,etape_projet.ordre
										) table1
									  ON 
										historique_lot.historique_lot_id = table1.historique_lot_id
									  GROUP BY historique_lot.lot_id
								) table2
								ON
								 lot.lot_id = table2.lot_id
							) table3
							ON lot.lot_id = table3.lot_id
							WHERE 1=1  AND projet_id IN (8,9,10,11,12,13,14)  AND lot.projet_id IN (9)  AND lot.lot_id IN (4122,4123,4124,4125,4126,4127,4128) AND termine_id IN (0,1)ORDER BY  lot_id asc LIMIT 0,54 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 10:10:05 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT\r\n\t\t\t\t\t\t\t...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(665): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 10:30:20 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT COUNT(*) as nb,SUM(avancement_globale) as somme FROM (SELECT
								lot.lot_id,
								nombre_doc,
								datetime_creation,
								commande_vivetic,
								nom_zip,
								nom_zip_original,
								createur_lot,
								datetime_modification,
								modificateur_lot,
								datetime_validation,
								nom_projet,
								projet_id,
								avancement_globale,
								CASE WHEN volume_piece = 0 THEN nombre_doc ELSE volume_piece END AS volume_piece,
								nom_zip_temp,
								duree_traitement,
								termine_id,
								lot.termine,
								etat,
								nb_notif,
								nb_total_lot,
								nb_notif notif
							FROM
							(
								SELECT
									lot_final.lot_id,
									lot_final.nombre_doc,
									lot_final.datetime_creation,
									lot_final.commande_vivetic,
									lot_final.nom_zip,
									lot_final.nom_zip_original,
									lot_final.createur createur_lot,
									lot_final.datetime_modification,
									lot_final.modificateur modificateur_lot,
									lot_final.datetime_validation,
									lot_final.nom_projet,
									lot_final.projet_id,
									lot_final.avancement_globale,
									lot_final.nom_zip_temp,
									lot_final.duree_traitement,
									lot_final.termine_id,
									lot_final.termine,
									t4.nb_notif,
									t4.nb_total_lot,
									t4.nb_notif notif
								FROM
									(SELECT
										l.lot_id lot_id,
										nombre_doc,
										l.datetime_creation datetime_creation,
										commande_vivetic,
										nom_zip,
										nom_zip_original,
										createur,
										datetime_modification,
										modificateur,
										datetime_validation,
										p.nom_projet nom_projet,
										p.projet_id projet_id,
										avancement_globale,
										nom_zip_temp,
										CASE
											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																datetime_debut_max))
											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																now()))
										END AS duree_traitement,

										termine termine_id,
										CASE
											WHEN termine = 0 THEN "Non Terminé"
											ELSE "Terminé"
										END as termine
									FROM
										(
											SELECT
												lot1.*, u.username modificateur
											FROM
												(
													SELECT
														l.*, u.username createur
													FROM
														(SELECT
															*
														FROM
															lot) l
													LEFT JOIN
														(SELECT
															id, username
														FROM
															users) u
													ON l.createur_lot = u.id
												)  lot1
											LEFT JOIN
												(SELECT
													id, username
												FROM
													users
												) u
											ON lot1.modificateur_lot = u.id
										) l
									LEFT JOIN
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
													SUM(volume_doc) volume_doc
												FROM
													(SELECT
														hl2.lot_id,

														hl2.volume_doc*100 as volume_doc,
														ep.etape_id
													FROM
														(
														SELECT
															*
														FROM
															historique_lot
														WHERE historique_lot_id IN	(
																			SELECT 	
																				MAX(historique_lot_id)
																			FROM 
																				historique_lot
																			GROUP BY lot_id, etape_projet_id
																		)
														) hl2,
														etape_projet ep,
														lot l
													WHERE
														ep.etape_projet_id = hl2.etape_projet_id
														AND ep.projet_id = l.projet_id
													GROUP BY
														hl2.lot_id,
														ep.etape_id) t
												GROUP BY lot_id
												) t1,
												(SELECT
													COUNT(*) nb_etape,
													lot_id,
													nombre_doc
												FROM
													etape_projet,
													lot
												WHERE
													etape_projet.projet_id = lot.projet_id
													AND lot.lot_id in (
																		SELECT
																			lot_id
																		FROM
																			lot   )
												GROUP BY lot.lot_id
												) t2,
												(SELECT
													lot_id,
													max(datetime_debut_max) as datetime_debut_max,
													max(t.delai)*60 as delai
												FROM
													(SELECT
														hl.lot_id,
														ep.delai,
														ep.ordre,
														MAX(hl.datetime_debut) datetime_debut_max,
														MAX(hl.datetime_fin) datetime_fin_max
													FROM
														etape_projet ep,
														historique_lot hl
													WHERE
														hl.etape_projet_id = ep.etape_projet_id
													GROUP BY
														ep.etape_id, hl.lot_id
													ORDER BY
														hl.lot_id, ep.ordre
													) t
												GROUP BY t.lot_id
												) t3
											WHERE
												t1.lot_id = t2.lot_id
												AND t1.lot_id = t3.lot_id
												AND                          t1.lot_id = l.lot_id
											GROUP BY t1.lot_id
										) req
									ON l.lot_id = req.lot_id
									INNER JOIN
										projet p
									ON l.projet_id = p.projet_id
									) lot_final
								LEFT JOIN
									(
										SELECT
											mes5.lot_id, mes5.nb_notif,
											CASE
												WHEN nb_total IS NULL THEN 0
												ELSE nb_total
											END as nb_total_lot
										FROM
										(
											SELECT
												l.lot_id,
												CASE
													WHEN nb IS NULL THEN 0
													ELSE nb
												END as nb_notif
											FROM
												lot l
											LEFT JOIN
												(
													SELECT
														lot_id,
														COUNT(*) AS nb
													FROM
														message
													INNER JOIN
														message_user
															ON message.message_id = message_user.message_id
													WHERE
														datetime_lecture IS NULL
														AND message_user.user_id=  16
													GROUP BY
														lot_id
												) t_nb
													ON l.lot_id =t_nb.lot_id
											) mes5
										LEFT JOIN
											(
												SELECT
													lot_id,
													COUNT(*) AS nb_total
												FROM
													message
												INNER JOIN
													message_user
														ON message.message_id = message_user.message_id
												WHERE
													message_user.user_id=   16
												GROUP BY
													lot_id
											) mes6
										ON mes5.lot_id = mes6.lot_id
									)   t4
								ON lot_final.lot_id = t4.lot_id
							) lot
							LEFT JOIN
							(
								SELECT
									lot_id,
									termine ,
									CASE
										WHEN termine = 1 THEN "Terminé"
										WHEN (SELECT LOCATE( "Alerte", statut )) > 0 THEN "Alerte délai"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is not null THEN "En cours"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is null THEN "Créé"
										ELSE "En cours"
									END AS etat
								FROM
								(
									SELECT
										lot_id,
										datetime_creation,
										projet_id,
										nom_zip,
										termine ,
										MIN(compare_fin) compare_fin,
										GROUP_CONCAT( statut SEPARATOR "," ) statut
										,MIN(debut) debut
									FROM
									(
										SELECT
											lot_id,
											datetime_creation,
											projet_id,
											nom_zip,
											termine ,
											etape_projet_id,
											etape_id,
											delai,
											deadline_etape,
											compare_fin,
											CASE 	WHEN compare_fin < now() THEN "OK"
													WHEN compare_fin >= now() AND TIME_TO_SEC(TIMEDIFF(deadline_etape,compare_fin)) < 0 THEN "Alerte"
													ELSE "OK" END statut
											,debut
										FROM
										(
										
										
										
										
											SELECT
														ddl.lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														ddl.etape_projet_id,
														etape_id,
														delai,
														deadline_etape,
														CASE WHEN fin IS NULL THEN NOW() ELSE fin END compare_fin
														,hl.debut
											FROM
											(
												SELECT
														lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														dl.etape_projet_id,
														etape_id,
														delai,
													ADDDATE(datetime_creation , INTERVAL delai HOUR) deadline_etape
												FROM
												(
													SELECT
														l.lot_id,
														l.datetime_creation,
														l.projet_id,
														l.nom_zip,
														l.termine ,
														ep.etape_projet_id,
														ep.etape_id,
														ep.delai
													FROM
														lot l
														INNER JOIN etape_projet ep
															ON l.projet_id = ep.projet_id
													#WHERE l.projet_id = 1
													ORDER BY l.lot_id , ep.etape_id
												)dl
											) ddl
											LEFT JOIN (
												SELECT
													lot_id,
													etape_projet_id,
													CASE WHEN MAX(datetime_fin) IS NULL THEN NOW() ELSE MAX(datetime_fin) END fin
													,CASE WHEN MAX(datetime_debut) IS NULL THEN NOW() ELSE MAX(datetime_debut) END debut
												FROM
													historique_lot
												GROUP BY
													lot_id,
													etape_projet_id

											) hl
											ON ddl.lot_id = hl.lot_id AND ddl.etape_projet_id = hl.etape_projet_id
											
											
											
											
										) tba
									) tab2
									GROUP BY lot_id
								) final_etat
							) etat_final
							ON lot.lot_id = etat_final.lot_id
							LEFT JOIN
							(
								SELECT 
									lot.lot_id,CASE WHEN table2.volume_piece IS NULL THEN 0 ELSE  table2.volume_piece END volume_piece
								FROM 
									lot
								LEFT JOIN 
								(
									  SELECT
										historique_lot.lot_id,historique_lot.volume_piece,table1.libelle
									  FROM
										historique_lot
									  JOIN
										(
											SELECT 
												max(historique_lot_id) historique_lot_id,etape.defaut,etape_projet.ordre,etape.libelle
											FROM 
												historique_lot,etape_projet,etape
											WHERE historique_lot.etape_projet_id = etape_projet.etape_projet_id  AND etape.etape_id = etape_projet.etape_id AND etape.defaut = 0
											GROUP BY historique_lot.etape_projet_id,lot_id
											ORDER BY lot_id,historique_lot.etape_projet_id,etape_projet.ordre
										) table1
									  ON 
										historique_lot.historique_lot_id = table1.historique_lot_id
									  GROUP BY historique_lot.lot_id
								) table2
								ON
								 lot.lot_id = table2.lot_id
							) table3
							ON lot.lot_id = table3.lot_id
							WHERE 1=1  AND projet_id IN (8,9,10,11,12,13,14)  AND lot.projet_id IN (9)  AND lot.lot_id IN (4122,4123,4124,4125,4126,4127,4128) AND termine_id IN (0,1)ORDER BY  lot_id asc) al ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 10:30:20 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(667): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 17:30:15 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4812] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:30:56 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4813] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:31:01 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4814] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:31:38 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4815] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:31:48 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4816] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:31:56 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4817] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:32:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4818] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:32:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4819] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:38:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4820] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:38:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4821] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:38:59 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4822] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:03 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4823] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:06 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4824] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:08 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4825] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4826] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4827] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:14 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4828] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:19 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4829] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4830] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4831] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4832] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:39:30 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4833] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:41:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4834] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:41:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4835] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:41:48 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4836] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:42:04 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4837] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:42:10 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4838] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:42:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4839] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:42:30 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4840] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:42:45 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4841] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:42:53 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4842] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4843] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4844] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:16 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4845] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4846] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:31 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4847] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:42 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4848] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:45 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4849] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4850] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:52 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4851] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:43:55 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4852] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:44:17 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4853] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:44:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4854] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:44:35 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4855] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:44:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4856] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:45:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4857] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:45:14 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4858] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:45:20 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4859] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:45:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4860] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:45:32 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4861] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:47:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4862] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:47:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4863] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:47:35 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4864] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:48:10 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4865] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:48:13 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4866] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:48:25 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4867] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:48:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4868] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:49:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4869] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:49:53 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4870] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:50:03 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4871] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 17:53:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4872] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:14:56 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4873] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:14:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4874] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4875] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:03 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4876] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4877] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:10 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4878] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:14 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4879] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:18 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4880] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:19 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4881] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:20 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4882] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:22 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4883] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:25 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4884] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4885] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4886] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:29 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4887] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:31 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4888] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:35 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4889] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:38 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4890] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:43 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4891] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4892] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4893] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:52 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4894] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:56 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4895] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:57 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4896] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:15:59 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4897] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:16:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4898] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:16:08 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4899] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:16:10 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4900] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:16:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4901] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:16:30 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4902] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:19:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4903] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:19:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4904] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:19:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4905] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:19:37 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4906] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:19:38 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4907] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:19:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4908] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:19:45 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4909] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:19:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4910] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:20:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4911] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:20:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4912] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:20:52 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4913] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4914] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:02 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4915] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:06 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4916] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4917] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:16 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4918] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:18 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4919] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:21 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4920] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4921] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:30 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4922] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:36 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4923] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:46 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4924] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:48 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4925] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:50 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4926] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:21:54 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4927] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:22:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4928] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:22:14 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4929] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:22:16 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4930] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:22:21 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4931] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:22:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4932] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4933] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:05 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4934] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:13 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4935] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:20 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4936] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4937] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:25 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4938] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4939] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:31 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4940] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:32 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4941] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4942] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:35 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4943] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:39 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4944] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4945] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4946] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:53 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4947] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:55 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4948] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:24:57 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4949] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:25:02 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4950] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:25:05 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4951] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:25:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4952] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:25:16 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4953] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:25:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4954] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:25:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4955] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:25:29 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4956] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:25:35 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4957] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:26:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4958] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:26:02 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4959] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:26:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4960] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:26:09 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4961] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:26:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4962] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:27:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4963] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:27:31 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4964] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:27:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4965] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:27:36 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4966] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:27:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4967] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:27:47 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4968] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:27:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4969] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:27:59 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4970] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:04 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4971] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:06 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4972] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:08 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4973] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:13 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4974] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4975] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:25 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4976] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4977] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:37 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4978] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4979] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:43 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4980] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4981] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:46 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4982] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:52 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4983] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:54 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4984] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:56 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4985] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:28:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4986] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:29:03 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4987] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:29:06 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4988] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:29:10 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4989] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:29:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4990] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:29:17 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4991] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:29:18 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4992] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:33 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4993] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:35 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4994] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:36 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4995] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:39 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4996] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:40 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4997] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4998] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4999] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:47 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5000] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:55 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5001] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5002] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:30:59 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5003] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:01 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5004] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:05 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5005] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:06 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5006] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:08 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5007] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5008] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:17 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5009] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:22 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5010] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5011] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:30 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5012] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:32 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5013] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5014] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:43 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5015] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:46 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5016] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:50 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5017] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5018] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:53 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5019] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:54 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5020] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:31:57 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5021] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:32:01 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5022] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:13 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5023] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:15 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5024] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:17 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5025] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5026] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5027] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5028] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:33 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5029] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:38 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5030] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:40 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5031] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:42 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5032] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5033] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:50 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5034] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:33:55 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5035] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:04 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5036] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:06 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5037] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:08 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5038] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5039] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:15 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5040] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:16 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5041] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:18 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5042] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:20 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5043] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5044] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:40 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5045] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:46 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5046] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:47 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5047] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5048] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5049] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:57 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5050] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:34:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5051] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:01 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5052] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:03 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5053] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5054] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:09 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5055] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5056] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:13 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5057] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:16 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5058] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:18 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5059] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:20 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5060] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5061] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5062] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:32 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5063] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:37 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5064] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:38 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5065] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5066] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:35:47 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5067] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5068] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5069] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:30 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5070] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:32 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5071] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5072] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5073] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:42 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5074] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5075] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5076] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:52 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5077] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:54 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5078] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:56 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5079] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:39:57 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5080] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:02 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5081] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:03 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5082] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:05 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5083] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:08 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5084] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:09 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5085] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5086] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:15 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5087] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:18 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5088] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:20 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5089] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5090] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5091] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5092] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:28 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5093] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:33 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5094] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5095] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:36 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5096] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:43 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5097] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:46 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5098] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:48 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5099] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5100] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:40:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5101] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:43:45 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5102] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:43:50 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5103] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:43:53 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5104] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:43:59 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5105] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:44:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5106] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:44:08 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5107] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:44:10 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5108] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:44:21 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5109] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:44:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5110] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:44:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5111] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:44:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5112] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5113] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:25 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5114] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5115] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:29 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5116] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:33 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5117] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:37 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5118] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:43 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5119] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:47 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5120] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5121] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5122] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:52 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5123] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:56 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5124] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:45:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5125] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:46:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5126] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:46:02 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5127] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:46:04 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5128] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:46:09 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5129] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:46:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5130] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:46:19 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 5131] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-12-06 18:56:08 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT COUNT(*) as nb,SUM(avancement_globale) as somme FROM (SELECT
								lot.lot_id,
								nombre_doc,
								datetime_creation,
								commande_vivetic,
								nom_zip,
								nom_zip_original,
								createur_lot,
								datetime_modification,
								modificateur_lot,
								datetime_validation,
								nom_projet,
								projet_id,
								avancement_globale,
								CASE WHEN volume_piece = 0 THEN nombre_doc ELSE volume_piece END AS volume_piece,
								nom_zip_temp,
								duree_traitement,
								termine_id,
								lot.termine,
								etat,
								nb_notif,
								nb_total_lot,
								nb_notif notif
							FROM
							(
								SELECT
									lot_final.lot_id,
									lot_final.nombre_doc,
									lot_final.datetime_creation,
									lot_final.commande_vivetic,
									lot_final.nom_zip,
									lot_final.nom_zip_original,
									lot_final.createur createur_lot,
									lot_final.datetime_modification,
									lot_final.modificateur modificateur_lot,
									lot_final.datetime_validation,
									lot_final.nom_projet,
									lot_final.projet_id,
									lot_final.avancement_globale,
									lot_final.nom_zip_temp,
									lot_final.duree_traitement,
									lot_final.termine_id,
									lot_final.termine,
									t4.nb_notif,
									t4.nb_total_lot,
									t4.nb_notif notif
								FROM
									(SELECT
										l.lot_id lot_id,
										nombre_doc,
										l.datetime_creation datetime_creation,
										commande_vivetic,
										nom_zip,
										nom_zip_original,
										createur,
										datetime_modification,
										modificateur,
										datetime_validation,
										p.nom_projet nom_projet,
										p.projet_id projet_id,
										avancement_globale,
										nom_zip_temp,
										CASE
											WHEN termine = 1 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																datetime_debut_max))
											WHEN termine = 0 THEN SEC_TO_TIME(TIMESTAMPDIFF(SECOND,
																l.datetime_creation,
																now()))
										END AS duree_traitement,

										termine termine_id,
										CASE
											WHEN termine = 0 THEN "Non Terminé"
											ELSE "Terminé"
										END as termine
									FROM
										(
											SELECT
												lot1.*, u.username modificateur
											FROM
												(
													SELECT
														l.*, u.username createur
													FROM
														(SELECT
															*
														FROM
															lot) l
													LEFT JOIN
														(SELECT
															id, username
														FROM
															users) u
													ON l.createur_lot = u.id
												)  lot1
											LEFT JOIN
												(SELECT
													id, username
												FROM
													users
												) u
											ON lot1.modificateur_lot = u.id
										) l
									LEFT JOIN
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
													SUM(volume_doc) volume_doc
												FROM
													(SELECT
														hl2.lot_id,

														hl2.volume_doc*100 as volume_doc,
														ep.etape_id
													FROM
														(
														SELECT
															*
														FROM
															historique_lot
														WHERE historique_lot_id IN	(
																			SELECT 	
																				MAX(historique_lot_id)
																			FROM 
																				historique_lot
																			GROUP BY lot_id, etape_projet_id
																		)
														) hl2,
														etape_projet ep,
														lot l
													WHERE
														ep.etape_projet_id = hl2.etape_projet_id
														AND ep.projet_id = l.projet_id
													GROUP BY
														hl2.lot_id,
														ep.etape_id) t
												GROUP BY lot_id
												) t1,
												(SELECT
													COUNT(*) nb_etape,
													lot_id,
													nombre_doc
												FROM
													etape_projet,
													lot
												WHERE
													etape_projet.projet_id = lot.projet_id
													AND lot.lot_id in (
																		SELECT
																			lot_id
																		FROM
																			lot   )
												GROUP BY lot.lot_id
												) t2,
												(SELECT
													lot_id,
													max(datetime_debut_max) as datetime_debut_max,
													max(t.delai)*60 as delai
												FROM
													(SELECT
														hl.lot_id,
														ep.delai,
														ep.ordre,
														MAX(hl.datetime_debut) datetime_debut_max,
														MAX(hl.datetime_fin) datetime_fin_max
													FROM
														etape_projet ep,
														historique_lot hl
													WHERE
														hl.etape_projet_id = ep.etape_projet_id
													GROUP BY
														ep.etape_id, hl.lot_id
													ORDER BY
														hl.lot_id, ep.ordre
													) t
												GROUP BY t.lot_id
												) t3
											WHERE
												t1.lot_id = t2.lot_id
												AND t1.lot_id = t3.lot_id
												AND                          t1.lot_id = l.lot_id
											GROUP BY t1.lot_id
										) req
									ON l.lot_id = req.lot_id
									INNER JOIN
										projet p
									ON l.projet_id = p.projet_id
									) lot_final
								LEFT JOIN
									(
										SELECT
											mes5.lot_id, mes5.nb_notif,
											CASE
												WHEN nb_total IS NULL THEN 0
												ELSE nb_total
											END as nb_total_lot
										FROM
										(
											SELECT
												l.lot_id,
												CASE
													WHEN nb IS NULL THEN 0
													ELSE nb
												END as nb_notif
											FROM
												lot l
											LEFT JOIN
												(
													SELECT
														lot_id,
														COUNT(*) AS nb
													FROM
														message
													INNER JOIN
														message_user
															ON message.message_id = message_user.message_id
													WHERE
														datetime_lecture IS NULL
														AND message_user.user_id=  20
													GROUP BY
														lot_id
												) t_nb
													ON l.lot_id =t_nb.lot_id
											) mes5
										LEFT JOIN
											(
												SELECT
													lot_id,
													COUNT(*) AS nb_total
												FROM
													message
												INNER JOIN
													message_user
														ON message.message_id = message_user.message_id
												WHERE
													message_user.user_id=   20
												GROUP BY
													lot_id
											) mes6
										ON mes5.lot_id = mes6.lot_id
									)   t4
								ON lot_final.lot_id = t4.lot_id
							) lot
							LEFT JOIN
							(
								SELECT
									lot_id,
									termine ,
									CASE
										WHEN termine = 1 THEN "Terminé"
										WHEN (SELECT LOCATE( "Alerte", statut )) > 0 THEN "Alerte délai"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is not null THEN "En cours"
										WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND debut is null THEN "Créé"
										ELSE "En cours"
									END AS etat
								FROM
								(
									SELECT
										lot_id,
										datetime_creation,
										projet_id,
										nom_zip,
										termine ,
										MIN(compare_fin) compare_fin,
										GROUP_CONCAT( statut SEPARATOR "," ) statut
										,MIN(debut) debut
									FROM
									(
										SELECT
											lot_id,
											datetime_creation,
											projet_id,
											nom_zip,
											termine ,
											etape_projet_id,
											etape_id,
											delai,
											deadline_etape,
											compare_fin,
											CASE 	WHEN compare_fin < now() THEN "OK"
													WHEN compare_fin >= now() AND TIME_TO_SEC(TIMEDIFF(deadline_etape,compare_fin)) < 0 THEN "Alerte"
													ELSE "OK" END statut
											,debut
										FROM
										(
										
										
										
										
											SELECT
														ddl.lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														ddl.etape_projet_id,
														etape_id,
														delai,
														deadline_etape,
														CASE WHEN fin IS NULL THEN NOW() ELSE fin END compare_fin
														,hl.debut
											FROM
											(
												SELECT
														lot_id,
														datetime_creation,
														projet_id,
														nom_zip,
														termine ,
														dl.etape_projet_id,
														etape_id,
														delai,
													ADDDATE(datetime_creation , INTERVAL delai HOUR) deadline_etape
												FROM
												(
													SELECT
														l.lot_id,
														l.datetime_creation,
														l.projet_id,
														l.nom_zip,
														l.termine ,
														ep.etape_projet_id,
														ep.etape_id,
														ep.delai
													FROM
														lot l
														INNER JOIN etape_projet ep
															ON l.projet_id = ep.projet_id
													#WHERE l.projet_id = 1
													ORDER BY l.lot_id , ep.etape_id
												)dl
											) ddl
											LEFT JOIN (
												SELECT
													lot_id,
													etape_projet_id,
													CASE WHEN MAX(datetime_fin) IS NULL THEN NOW() ELSE MAX(datetime_fin) END fin
													,CASE WHEN MAX(datetime_debut) IS NULL THEN NOW() ELSE MAX(datetime_debut) END debut
												FROM
													historique_lot
												GROUP BY
													lot_id,
													etape_projet_id

											) hl
											ON ddl.lot_id = hl.lot_id AND ddl.etape_projet_id = hl.etape_projet_id
											
											
											
											
										) tba
									) tab2
									GROUP BY lot_id
								) final_etat
							) etat_final
							ON lot.lot_id = etat_final.lot_id
							LEFT JOIN
							(
								SELECT 
									lot.lot_id,CASE WHEN table2.volume_piece IS NULL THEN 0 ELSE  table2.volume_piece END volume_piece
								FROM 
									lot
								LEFT JOIN 
								(
									  SELECT
										historique_lot.lot_id,historique_lot.volume_piece,table1.libelle
									  FROM
										historique_lot
									  JOIN
										(
											SELECT 
												max(historique_lot_id) historique_lot_id,etape.defaut,etape_projet.ordre,etape.libelle
											FROM 
												historique_lot,etape_projet,etape
											WHERE historique_lot.etape_projet_id = etape_projet.etape_projet_id  AND etape.etape_id = etape_projet.etape_id AND etape.defaut = 0
											GROUP BY historique_lot.etape_projet_id,lot_id
											ORDER BY lot_id,historique_lot.etape_projet_id,etape_projet.ordre
										) table1
									  ON 
										historique_lot.historique_lot_id = table1.historique_lot_id
									  GROUP BY historique_lot.lot_id
								) table2
								ON
								 lot.lot_id = table2.lot_id
							) table3
							ON lot.lot_id = table3.lot_id
							WHERE 1=1  AND projet_id IN (10) AND termine_id IN (0,1)ORDER BY  lot_id asc) al ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-12-06 18:56:08 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(667): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251