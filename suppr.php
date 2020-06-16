<?php
// include "modal.php";
if (!empty($_GET['dir'])){
$dirroad = $_GET['dir'];
}
else {
  $dirroad = getcwd();
}
$del_name = $_POST['delete'];
$del_road = $dirroad . DIRECTORY_SEPARATOR . $del_name;

if (!file_exists($del_road)){
  echo"le fichier n'existe pas";
}
else {
  if (is_dir($del_road)){
    rmdir($del_road);
  }
  else {
    unlink($del_road);
  }
}
