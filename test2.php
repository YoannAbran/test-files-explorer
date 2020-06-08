<?php



function ScanDirectory($pDir, $pData) {

    if (!empty($pData)) {
        $pDir = $pDir.'/'.$pData;
    }

    if ($dir = opendir($pDir)) {
        $listDir = array();
        $i = 0;

        while($file = readdir($dir)) {
            if($file != '.' && $file != '..') {
                if (!empty($pData)) {
                    $listDir[$i] = $pData.'/'.$file;
                } else {
                   $listDir[$i] = $file;
                }
                $i = $i + 1;
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
