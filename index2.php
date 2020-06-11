<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <title>Files-explorer</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>





<nav aria-label='breadcrumb' class=''>
  <ol class='breadcrumb bg-dark  m-4 p-4'>
    <li class='breadcrumb-item active ' ><a class='text-light'href='index2.php'>&nbspRacine&nbsp</a></li>
<?php
include "scandir.php";
include "gestionfichier.php";

if (!empty($_GET['dir'])){
  $crumbs=explode('/',$_GET['dir']);
}

// this splits the sections of $_GET['dir'] separated by / into an array of values
$url_pre=''; // we'll use this to keep track of the crumbs we've sifted through already

// foreach cycles through each element in an array
// $crumbs is the array, and $crumb is the current listing in the array we're looking at
if (!empty($_GET['dir'])){
foreach($crumbs as $crumb){
    $url_pre .= $crumb;
    echo "<li class=''><a class='text-light' href='?dir=".$url_pre."'>&nbsp/&nbsp$crumb&nbsp</a></li>";
    $url_pre .= '/'; // add this after you echo the link, so that dir doesn't start
  }
}
?>
</ol>
</nav>

<?php

echo"<table class=\"table table-dark table-striped table-hover m-4 rounded border-light\">
  <thead>
    <tr>
      <th scope=\"col\">Nom</th>
      <th scope=\"col\">Taille</th>
      <th scope=\"col\">Type</th>
      <th scope=\"col\">Date modif</th>
    </tr>
  </thead>
  <tbody class=''>";




  foreach ($list as $item) {
    if (file_exists($item)) {


     $size = "<span style='font-size:12px;'>".filesize($item)."</span>";
     $type = "<span style='font-size:12px;'>".mime_content_type($item)."</span>";
     $date = "<span style='font-size:12px;'>".date("d-m-Y H:i:s",filemtime($item))."</span>";
     $baseitem =basename($item);

     if (is_dir("$item")) {
        echo "<tr>
        <td><i class=\"fas fa-folder text-primary \"></i> <a class='text-light' href=\"".$_SERVER['PHP_SELF']."?dir=".rawurlencode($item).
        "\">$baseitem</a></td>
        <td>$size</td>
        <td>$type</td>
        <td>$date</td></tr>";
     }
     else {
        echo "<tr><td><i class=\"fas fa-file text-danger\"></i> <a class='text-white ' href=\"".$item."\">$baseitem</a></td>
        <td>$size</td>
        <td>$type</td>
        <td>$date</td></tr>";
     }
  }
}

  echo "<section class='container-fluid '>
<div class='row'>
  <!-- Création de dossier -->
  <div class='col-sm p-4 m-4 bg-dark text-white text-center rounded border border-light'>
    <form class='mb-2' action='' method='post'>
       <label for='nom_dossier' class='text-uppercase font-weight-bold'>création de dossier</label><br>
       <input type='text' placeholder='Nom du nouveau dossier' name='nom_dossier'><button type='submit' class='ml-1'>Créer</button>
    </form><br>";

      echo $text_dossier;


echo   "</div>";


echo "  <div class='col-sm p-4 m-4 bg-dark text-white text-center rounded border border-light'>
    <form class='mb-2' action='' method='post'>
       <label for='nom_fichier' class='text-uppercase font-weight-bold'>création de fichier</label><br>
       <input type='text' placeholder='Nom du nouveau fichier' name='nom_fichier'><button type='submit' class='ml-1'>Créer</button>
    </form><br>";

      echo $text_fichier;

  echo "</div>";


  echo "<div class='col-sm p-4 m-4 bg-dark text-white text-center rounded border border-light'>
    <form class='mb-2' action='' method='post'>
       <label for='suppr_fichier' class='text-uppercase font-weight-bold'>suppression de fichier</label><br>
       <input type='text' placeholder='Nom du fichier à supprimer' name='suppr_fichier'>
       <button type='submit' class='ml-1' >Supprimer</button>
    </form><br>";

      echo $text_suppr;

echo  "</div>

</div>
</section>";



?>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>
