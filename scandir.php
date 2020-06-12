<?php

//fonction pour pointer le dossier courant et scanner son contenu
function ScanDirectory($pDir, $pData) {

//vérifie que la variable n'est pas vide
    if (!empty($pData)) {
//création du chemin
        $pDir = $pDir.DIRECTORY_SEPARATOR.$pData;
    }
//ouvre et pointe le dossier courant
    if ($dir = opendir($pDir)) {
// créé un tableau
        $listDir = array();

//créé une boucle qui lit le dossier
        while($file = readdir($dir)) {
//supprime les "." et ".." n'apparaissent pas
            if($file !== '.' && $file !== '..') {
//verifie que la variable n'est pas vide s'il n'est pas vide enregistre dans un tableau les chemins
                if (!empty($pData)) {
                    $listDir[] = $pData.DIRECTORY_SEPARATOR.$file;
//sinon enregistre les fichier dans le tableau
                } else {
                   $listDir[] = $file;
                }
          }
        }
//ferme le dossier
    closedir($dir);
    }
//retourn le tableau
    return $listDir;
}

//chemin du fichier index
$defaultDir = getcwd();

//utilisation de la fonction pour changer les dossier et fichier selon le dossier dans lequel on ce trouve
if (empty($_GET['dir']))  {
    $list = ScanDirectory($defaultDir, "");
} else {
    $dir = $_GET['dir'];
    $list = ScanDirectory($defaultDir, $dir);
}
chdir($defaultDir);
