<?php
	
	$imagesPath="../misc/download";
	$ret = 0;
	
	if (isset($_GET['data']) &&  isset($_GET['lot'])) {
		$urlimg = $imagesPath . "/".$_GET['data']."/".$_GET['data'].".zip" ;
		if(file_exists($urlimg))
		{
			$ret = 1;
		}
	}
	echo json_encode($ret);
?>
