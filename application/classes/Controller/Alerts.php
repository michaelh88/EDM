<?php
defined('SYSPATH') or die('No direct script access.');

final class Controller_Alerts extends Controller_Website {

    final static private function compareStatsValToLimit($compType, $val, $limit) {

        $res = false;
        if ($compType == 0) {

            $res = $val > $limit;
        } elseif ($compType == 1) {

            $res = $val < $limit;
        }

        return $res;
    }

    final public function action_ajax_getAlerts() {
        $limitsAlerts = "";
        $limitsKo = "";
        $nonlu = 0;
        $koCount = 0;
        $cur_role = $this->current_user_role;
        $url = URL::site('lot/list');
        // CONCAT ('Message non lu pour le lot : ' , l.nom_zip) AS info_alert	
        // filtre_param_alert_messagenonlu(\'lot_value\');
        // filtre_param_alert_lot();


        $sql = "		
			select 
			group_concat(lot_id) info_alert
			,case when sum(nb) is null then 0 else sum(nb) end nonlu
			from (
							SELECT 
								l.lot_id
								,count(l.lot_id) nb
							FROM message_user mu
								INNER JOIN message m
									ON mu.message_id = m.message_id
								INNER JOIN 
								(
									select * from lot where termine !=2
								)l
									ON m.lot_id = l.lot_id
							WHERE mu.datetime_lecture IS  NULL
								AND mu.user_id= " . $this->current_user->id . "
							GROUP BY l.lot_id
			)tb
		
		";
        $rs_msg = DB::query(Database::SELECT, $sql)->execute()->as_array();
        foreach ($rs_msg as $ligne) {
            $limitsAlerts = $ligne["info_alert"];
            $nonlu = $ligne["nonlu"];
        }

        $sql_delai = "";
        $where = "";
        if ($cur_role == '2' || $cur_role == '4') {
            $where = " where 1=1 ";
        } else {
            $where = '	WHERE l.projet_id IN (	SELECT 	
													GROUP_CONCAT(projet_id) projet_id
												FROM 
													projet_user
												WHERE 	user_id = ' . $this->current_user->id . '	)';
        }
        $sql_delai = '	SELECT
							GROUP_CONCAT(lot_id) lot_list, 
							COUNT(lot_id) AS nb_lot
						FROM
						(	
							SELECT
								lot_id, 
								termine ,
								CASE
									WHEN termine = 1 THEN "Terminé"
									WHEN (SELECT LOCATE( "Alerte", statut )) > 0 THEN "Alerte délai"
									WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND compare_fin != now() THEN "EN cours"
									WHEN (SELECT LOCATE( "Alerte", statut )) = 0 AND compare_fin = now() THEN "Créer"
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
										CASE 
											WHEN compare_fin < now() THEN "OK"
											WHEN compare_fin >= now() AND TIME_TO_SEC(TIMEDIFF(deadline_etape,compare_fin)) < 0 THEN "Alerte" 
											ELSE "OK" END statut
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
												' . $where . '		
												ORDER BY l.lot_id , ep.etape_id
											)dl
										) ddl
										LEFT JOIN (
											SELECT 	
												lot_id, 
												etape_projet_id, 	
												CASE WHEN MAX(datetime_fin) IS NULL THEN NOW() ELSE MAX(datetime_fin) END fin
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
						) tab
						WHERE etat = "Alerte délai" and termine = 0 ';

        $rs_delai = DB::query(Database::SELECT, $sql_delai)->execute()->as_array();
        foreach ($rs_delai as $ligne) {
            $limitsKo = $ligne["lot_list"];
            $koCount = $ligne["nb_lot"];
        }

        try {
            
        } catch (Exception $exc) {

            Kohana::$log->add(LOG::ERROR, $exc->getMessage());
            $res = Kohana::message('misc', 'misc.error') . $exc->getMessage();
        }
        $resArr = array(
            'limits' => $limitsAlerts,
            'nonlu' => $nonlu,
            'koList' => $limitsKo,
            'koCount' => $koCount
        );

        $res = json_encode($resArr);

        $this->response->body($res);
    }

}
?>
