

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <title>Files-explorer</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm px-3 py-3 mt-3">
        <h2>Files explorer</h2>
      </div>
    </div>



  </div>

<div class="container">
  <div class="row">
    <div class="col-sm mt-3">

<table class="table table-dark table-hover mb-5">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Taille</th>
      <th scope="col">Type</th>
      <th scope="col">Date modif</th>
    </tr>
  </thead>
  <tbody>
<?php include "test.php"?>
<?php
function list_file($cur) {
global $order, $asc, $order0;
if ($dir = opendir($cur)) {
/* tableaux */
$tab_dir = array();
$tab_file = array();
/* extraction */
while($file = readdir($dir)) {
if(is_dir($cur.'/'.$file)) {
if(!in_array($file, array('.','..'))) {
$tab_dir[] = addScheme($file, $cur, 'dir');
}
} else {
$tab_file[] = addScheme($file, $cur, 'file');
}
}

foreach($tab_dir as $elem) {
echo '<tr ><td class ="col"> '.$elem['name'].
'</td>
<td class ="col">'.$elem['size'].'</td>
<td class ="col">'.$elem['type'].'</td>
<td class ="col">'.date("d/m/Y", $elem['date'])."</td></tr>\n";
}
foreach($tab_file as $elem) {
echo '<tr><td class ="col">'.$elem['name'].
'</td>
<td class ="col">'.$elem['size'].'</td>
<td class ="col">'.$elem['type'].'</td>
<td class ="col">'.date("d/m/Y", $elem['date'])."</td></tr>\n";

}
echo "</table>";
closedir($dir);
}
}

?>
<tr valign="top"><td class="">
  <?php
  if(!$dir) {
  echo "/<br />\n";
  } else {
  echo
  "<a href=\"".$_SERVER['PHP_SELF'].
  "\">/</a><br" .
  " />\n";
  }
  list_dir($BASE, rawurldecode($dir), 1);
  ?>
</td><td class="">
  <!-- liste des fichiers -->
  <?php
  /* répertoire initial à lister */
  if(!$dir) {
  $dir = $BASE;
  }
  list_file(rawurldecode($dir));
  ?>


</tbody></table>
  </div>
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
