

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


<!-- exploratur de fichier
1 script pout récup la liste de dossier pour le breadcrumbs et affiche les dernier dossier à partir du dossier courant-->

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" ><a href="index2.php">Home</a></li>


  </ol>
</nav>
<?php

include "test2.php";






// récupérer le chemin

echo"<table class=\"table table-dark table-hover mb-5\">
  <thead>
    <tr>
      <th scope=\"col\">Nom</th>
      <th scope=\"col\">Taille</th>
      <th scope=\"col\">Type</th>
      <th scope=\"col\">Date modif</th>
    </tr>
  </thead>
  <tbody>";




  foreach ($list as $item) {
     $size = "<span style='font-size:12px;'>".filesize($item)."</span>";
     $type = "<span style='font-size:12px;'>".mime_content_type($item)."</span>";
     $date = "<span style='font-size:12px;'>".date("d-m-Y H:i:s", filemtime($item))."</span>";

     if (is_dir("$item")) {
        echo "<tr>
        <td><i class=\"fas fa-folder text-primary \"></i> <a href=\"".$_SERVER['PHP_SELF']."?dir=".rawurlencode($item).
        "\">$item</a></td><td>$size<td>$type</td><td>$date</td>";
     }
     else {
        echo "<tr><td><i class=\"fas fa-file text-danger\"></i> <a class='text-white ' href=\"".$item."\">$item</a></td><td>$size</td><td>$type</td><td>$date</td></tr>";
     }
  }
 ?>

<!-- "1 script qui garde le lien de du dernier dossier"-->

<!-- 1 script qui recup et affiche les dossier et fichier un liens pour ouvrir les dossier -->




 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
