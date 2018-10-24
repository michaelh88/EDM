<?php

//$imagesPath="/var/www/html/sdvp/public/img/command/";
// $imagesPath="../pdf/";

$imagesPath = "../misc/download";

function telecharger_fichier($fichier, $fichier2) {
    $chemin = $fichier;
    if (file_exists($chemin)) {
        error_log($chemin);
        //HASINA
//        header('Content-Description: File Transfer');
//        //header('Content-Type: application/octet-stream; name="' . basename($chemin) . '"');
//        header('Content-Type: application/zip; name="' . basename($chemin) . '"');
//        header('Content-Disposition: inline; filename="' . basename($fichier2) . '"');
//        header('Content-Transfer-Encoding: binary');
//        header('Expires: 0');
//        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//        header('Pragma: public');
//        
//        header("Content-Transfer-Encoding: binary");
//        header("Cache-Control: private",false);
//        
//        
//        header('Content-Length: ' . filesize($chemin));
//        ob_clean();
//        flush();
//        readfile($chemin);
        //FIN HASINA
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=\"" . basename($fichier2) . "\"");
        header("Content-Length: " . filesize($chemin));
        ob_clean();
        flush();
        @readfile($chemin);
        exit;
    } else {
        // echo "Fichier n'existe pas [".$chemin."]";
    }
}

function getExtension($file) {
    return substr($file, -3);
}

if (isset($_GET['data']) && isset($_GET['lot'])) {
    $urlimg = $imagesPath . "/" . $_GET['data'] . "/" . $_GET['data'] . ".zip";
    $urlimg2 = $imagesPath . "/" . $_GET['data'] . "/" . $_GET['lot'] . ".zip";
    telecharger_fichier($urlimg, $urlimg2);
} else {
    
}
?>
