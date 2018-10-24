<?php
	function telecharger_fichier($name1,$name2)
	{
		$url = '../public/temp_file';
		// $url = '../public/temp_file';
		if(file_exists($url.'/'.$name2))
		{			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$name1.'"');
			header('Cache-Control: max-age=0');
			
			readfile($url.'/'.$name2);
			unlink($url.'/'.$name2);
			exit;
		}
		else {
			// echo "Fichier n'existe pas [".$chemin."]";
		}
	}

	if (isset($_GET['id_file']) &&  isset($_GET['user_id']) && isset($_GET['date']) && isset($_GET['granularite'])) {
		if($_GET['granularite'] == 0){
			$name1 = 'Statistique hebdomadaire du '.$_GET['date'].'.xls';
		}elseif($_GET['granularite'] == 1){
			$name1 = 'Statistique mensuel du '.$_GET['date'].'.xls';
		}else{
			$name1 = 'Statistique quotidient du '.$_GET['date'].'.xls';
		}
		$name2 = $_GET['id_file'].'_'.$_GET['user_id'].'output.xls';
		
		
		telecharger_fichier($name1,$name2);
		
	}

	
?>
