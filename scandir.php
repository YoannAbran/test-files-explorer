<?php



function ScanDirectory($pDir, $pData) {

    if (!empty($pData)) {
        $pDir = $pDir.DIRECTORY_SEPARATOR.$pData;
    }

    if ($dir = opendir($pDir)) {
        $listDir = array();


        while($file = readdir($dir)) {
            if($file != '.' && $file != '..') {
                if (!empty($pData)) {
                    $listDir[] = $pData.DIRECTORY_SEPARATOR.$file;

                } else {
                   $listDir[] = $file;

                }


          }
        }
    closedir($dir);
    }
    return $listDir;

}



$defaultDir = getcwd();

if (empty($_GET['dir']))  {
    $list = ScanDirectory($defaultDir, "");
} else {
    $dir = $_GET['dir'];
    $list = ScanDirectory($defaultDir, $dir);
}
chdir($defaultDir);
