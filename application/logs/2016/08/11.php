<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-08-11 08:27:13 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2858] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 08:27:24 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2859] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 08:27:39 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2860] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 08:27:52 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2861] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 08:28:26 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2862] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 08:28:29 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2863] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:24:13 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2864] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:26:45 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2865] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:30:16 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2866] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:32:58 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2867] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:34:15 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2868] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:34:34 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2869] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:34:56 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2870] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:40:02 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2871] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:40:07 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2872] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:40:22 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2873] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:40:30 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2874] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:40:34 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2875] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:40:44 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2876] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:40:48 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2877] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:40:52 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2878] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:53:30 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 2879] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:53:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 2880] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:53:38 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 2881] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:53:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 2882] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-11 15:54:17 --- EMERGENCY: Database_Exception [ 2013 ]: Lost connection to MySQL server during query [ SELECT
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
							WHERE 1=1  AND projet_id IN (8,9,10,11,12,13,14)  AND lot.projet_id IN (14)  AND lot.lot_id IN (1400,1401,1402,1403,1404,1405) AND termine_id IN (0,1)ORDER BY  lot_id asc LIMIT 0,63 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-08-11 15:54:17 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT\r\n\t\t\t\t\t\t\t...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(665): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-08-11 15:54:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 2883] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84