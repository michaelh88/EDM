<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-11-10 05:52:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3978] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 05:53:10 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3979] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 05:55:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3980] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 05:55:40 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3981] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 05:56:09 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3982] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 05:56:37 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3983] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 05:57:03 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3984] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 05:58:47 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3985] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 05:59:16 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3986] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 06:00:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3987] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 06:02:07 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3988] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 06:02:32 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3989] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 06:02:38 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3990] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 06:02:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3991] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 06:02:49 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 3992] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 08:34:53 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 3993] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 08:35:02 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 3994] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 08:35:22 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 3995] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 08:35:36 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 3996] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 08:35:42 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 3997] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 08:36:48 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 3998] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 08:37:10 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 3999] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 08:37:16 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 4000] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:01:54 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'desc LIMIT 0,153' at line 396 [ SELECT
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
							WHERE 1=1  AND projet_id IN (10) AND termine_id IN (0,1)ORDER BY   desc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:01:54 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT\r\n\t\t\t\t\t\t\t...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(665): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:01:54 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 396 [ SELECT
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
							WHERE 1=1  AND projet_id IN (10) AND termine_id IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:01:54 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT\r\n\t\t\t\t\t\t\t...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(665): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:01:54 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'desc LIMIT 0,153' at line 396 [ SELECT
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
							WHERE 1=1  AND projet_id IN (10) AND termine_id IN (0,1)ORDER BY   desc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:01:54 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT\r\n\t\t\t\t\t\t\t...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(665): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:01:54 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 396 [ SELECT
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
							WHERE 1=1  AND projet_id IN (10) AND termine_id IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:01:54 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT\r\n\t\t\t\t\t\t\t...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(665): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:06:28 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc LIMIT 0,153' at line 396 [ SELECT
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
							WHERE 1=1  AND projet_id IN (10) AND termine_id IN (0,1)ORDER BY   asc LIMIT 0,153 ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:06:28 --- DEBUG: #0 /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(1, 'SELECT\r\n\t\t\t\t\t\t\t...', false, Array)
#1 /home/fthmgedcbc/www/application/classes/Controller/Lot.php(665): Kohana_Database_Query->execute()
#2 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Lot->action_ajax_browse()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#8 {main} in /home/fthmgedcbc/www/modules/database/classes/Kohana/Database/Query.php:251
2016-11-10 09:07:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4001] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:07:41 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4002] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:07:56 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4003] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:08:06 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4004] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:08:09 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4005] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:08:13 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4006] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:08:17 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4007] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:08:21 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4008] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:08:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4009] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:08:29 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4010] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:08:31 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4011] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:09:01 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4012] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:09:13 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4013] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:09:19 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4014] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:09:46 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4015] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:10:09 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4016] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:10:40 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4017] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:11:38 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4018] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:12:17 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4019] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:12:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4020] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:12:48 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4021] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:12:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4022] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:13:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4023] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:15:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4024] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:18:35 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4025] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:20:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4026] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:20:59 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4027] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:21:26 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4028] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:21:50 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4029] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:28:31 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4030] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:28:51 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4031] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:30:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4032] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:30:18 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4033] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:30:37 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4034] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:31:08 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4035] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:32:53 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4036] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:33:23 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4037] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:34:25 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4038] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:36:09 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4039] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:36:55 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4040] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:37:27 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4041] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:37:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4042] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:40:11 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4043] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:40:39 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4044] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:41:48 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4045] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:43:13 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4046] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:44:06 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4047] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:44:43 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4048] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:45:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4049] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:51:29 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4050] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:53:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4051] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:54:12 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4052] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:54:52 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4053] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:55:00 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4054] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:55:05 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4055] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:55:44 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4056] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:55:59 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4057] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:56:04 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4058] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:56:53 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4059] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:57:24 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4060] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:57:58 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4061] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:58:10 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4062] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 09:58:37 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 4063] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 13:59:49 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4064] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:00:15 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4065] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:01:37 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4066] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:02:27 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4067] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:03:04 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4068] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:03:29 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4069] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:03:56 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4070] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:05:02 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4071] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:11:58 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4072] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:14:41 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4073] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:16:09 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4074] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:16:59 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4075] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:18:29 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4076] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:19:18 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4077] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:19:47 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4078] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:28:28 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4079] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:30:00 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4080] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:30:47 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4081] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:31:10 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4082] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:31:58 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4083] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:32:15 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4084] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:33:18 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4085] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:34:23 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4086] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:37:05 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4087] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:37:39 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4088] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:37:56 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4089] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:38:57 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4090] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:40:03 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4091] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:40:26 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4092] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:44:10 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4093] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:44:56 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4094] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:45:20 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4095] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:45:43 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4096] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:46:53 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4097] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:48:04 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4098] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:48:30 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4099] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:51:42 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4100] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:52:26 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4101] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:53:33 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4102] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:53:58 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4103] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:54:21 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4104] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:55:27 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4105] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 14:56:36 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4106] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:00:22 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4107] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:01:35 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4108] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:02:01 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4109] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:03:32 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4110] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:03:47 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4111] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:04:12 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4112] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:04:36 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4113] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:43:56 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4114] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:44:00 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4115] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:44:03 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4116] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:44:06 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4117] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:47:00 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4118] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:47:28 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4119] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:47:53 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4120] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-11-10 15:48:00 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 4121] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84