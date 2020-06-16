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
    <li class='breadcrumb-item active ' ><a class='text-light h5'href='index2.php'>&nbspRacine&nbsp</a></li>
<?php
// script pour démarré dans un sous-dossier au script
$home ="home";
if(!is_dir($home)){
mkdir("home");
}
chdir(getcwd().DIRECTORY_SEPARATOR.$home);

include "modal.php";
include "scandir.php";
include "suppr.php";
include "gestionfichier.php";
// vérifie que la variable n'est pas vide
if (!empty($_GET['dir'])){
// transforme l'url en tableau en prenant le / comme élément qui sépare les élément
  $crumbs=explode(DIRECTORY_SEPARATOR,$_GET['dir']);
}

// pour garder la trce de l'endroit ou l'on est dans le fil d'arianne
$url_pre='';

//on récupère chaque élément dans une variable $crumb du tableau $crumbs,on récupère les élément pour créer le fil d'arianne
if (!empty($_GET['dir'])){

foreach($crumbs as $crumb){
    $url_pre .= $crumb;
    echo "<li class=''><a class='text-light h5' href='?dir=".$url_pre."'>&nbsp/&nbsp$crumb&nbsp</a></li>";
    $url_pre .= DIRECTORY_SEPARATOR;
  }
}
?>
</ol>
</nav>

<?php
// tableau et table header
echo"<div class='container'>
  <table class=\"table table-dark table-striped table-hover m-4 rounded border-light\">
  <thead>
    <tr>
      <th scope=\"col\">Nom</th>
      <th scope=\"col\">Taille</th>
      <th scope=\"col\">Type</th>
      <th scope=\"col\">Date modif</th>
    </tr>
  </thead>
  <tbody class=''>";



//récupère les éléments du tableau $list qui utilise la fonction ScanDirectory
  foreach ($list as $item) {
    global $item;
    if (file_exists($item)) {

//récupère la taille, le type,la date et le nom des éléments
     $size = "<span style='font-size:12px;'>".filesize($item)."</span>";
     $type = "<span style='font-size:12px;'>".mime_content_type($item)."</span>";
     $date = "<span style='font-size:12px;'>".date("d-m-Y H:i:s",filemtime($item))."</span>";
     $baseitem =basename($item);

//on vérifie si l'element est un dossier,si oui on les affiches en créant un lien pour accéder au contenu de ce dossier en sauvgardant le chemin dans $_GET



     if (is_dir("$item")) {

        echo "

        <tr>
        <td><i class=\"fas fa-folder text-primary \"></i> <a class='text-light' href=\"".$_SERVER['PHP_SELF']."?dir=".rawurlencode($item).
        "\">$baseitem</a></td>
        <td>$size</td>
        <td>$type</td>
        <td>$date</td>

<form action='suppr.php' method='post'>
        <td><button  name='copy' class='btn text-primary' type='button' data-toggle='modal' data-target='#copymodal'><input type='hidden' name='copy' value='$item'><i class='fas fa-copy'></i></button></td>

        <td><button  name='cut' class='btn text-danger' type='button' data-toggle='modal' data-target='#cutmodal'><input type='hidden' name='cut' value='$item'><i class='fas fa-cut'></i></button></td>

        <td><button  name='paste' class='btn text-primary' type='button' data-toggle='modal' data-target='#pastemodal'><input type='hidden' name='paste' value='$item'><i class='fas fa-paste'></i></button></td>


        <td><button  name='delete' class='btn text-danger' onclick='confirm()' type='submit'  ><input type='hidden' name='delete' value='$item'><i class='fas fa-trash-alt'></i></button></td>
        </tr></form>
        ";
     }

// sinon c'est un fichier on les affiches avec un lien pour afficher leur contenu si le type le permet
     else {
        echo "
        <tr><td><i class='fas fa-file text-danger'></i> <a class='text-white ' href='".$item."'>$baseitem</a></td>
        <td>$size</td>
        <td>$type</td>
        <td>$date</td>

<form method='post'>
        <td><button  name='copy' class='btn text-primary' type='button' data-toggle='modal' data-target='#copymodal'><input type='hidden' name='copy' value='$item'><i class='fas fa-copy'></i></button></td>

        <td><button  name='cut' class='btn text-danger' type='button' data-toggle='modal' data-target='#cutmodal'><input type='hidden' name='cut' value='$item'><i class='fas fa-cut'></i></button></td>

        <td><button  name='paste' class='btn text-primary' type='button' data-toggle='modal' data-target='#pastemodal'><input type='hidden' name='paste' value='$item'><i class='fas fa-paste'></i></button></td>


        <td><button  name='delete' class='btn text-danger' onclick='confirm()' type='submit'  ><input type='hidden' name='delete' value='$item'><i class='fas fa-trash-alt'></i></button></td>
        </tr></form>
        ";
     }
  }
}
echo "</div>";
  echo "<section class='container-fluid justify-content-center '>
          <div class='row d-flex'>";

// Création de dossier
          echo  "<div class='col-sm p-3 m-4 bg-dark text-white text-center rounded border border-light'>
              <form class='mb-2' action='' method='post'>
                <label for='nom_dossier' class='text-uppercase font-weight-bold'>création de dossier</label><br>
                <input type='text' placeholder='Nom du nouveau dossier' name='nom_dossier'>
                <button type='submit' class='ml-1'>Créer</button>
              </form><br>";

      // echo $text_dossier;


echo   "</div>";

// Création de fichier
echo "  <div class='col-sm p-3 m-4 bg-dark text-white text-center rounded border border-light'>
          <form class='mb-2' action='' method='post'>
            <label for='nom_fichier' class='text-uppercase font-weight-bold'>création de fichier</label><br>
            <input type='text' placeholder='Nom du nouveau fichier' name='nom_fichier'>
            <button type='submit'  class='ml-1'>Créer</button>
          </form><br>";

      // echo $text_fichier;

  echo "</div>";

// Suppression de fichier et dossier
  echo "<div class='col-sm p-3 m-4 bg-dark text-white text-center rounded border border-light'>
          <form class='mb-2' action='' method='post'>
            <label for='suppr_fichier' class='text-uppercase font-weight-bold'>suppression de fichier</label><br>
            <input type='text' placeholder='Nom du fichier à supprimer' name='suppr_fichier'>
            <button type='submit' onclick='myFunction()' class='ml-1' >Supprimer</button>
          </form><br>";

      // echo $text_suppr;

echo  "</div>

  </div>
</section>";

?>

<script type=\"text/javascript\"> confirm('do you really, really want to delete this file?'); </script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>

<!-- echo "<script type=\"text/javascript\"> confirm('do you really, really want to delete this file?'); </script>"; -->
