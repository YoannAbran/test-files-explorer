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
    <?php

    if(isset($_POST['selected'])){
    $dir = scandir($_POST['selected']);
    if(chdir($_POST['selected'])){  //si un dossier est sélectionné aller vers ce dossier
      chdir($_POST['selected']);
    }else{
      chdir(getcwd());
    }
}

    $d = getcwd();   //dossier courant
    $dir = scandir($d); //recup ce qu'il y a dans le rep courrant sous forme d'array

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
    //Traitement
      foreach ($dir as $value){  //parcourt l'array
       if( is_dir(realpath("$value"))){   // verif si dossier

         // affiche les directory
         echo "<tr>

              <td><form method='POST'><input type='hidden' name='selected' value=".realpath($value).">
              <a href=".realpath($value)."><button class='btn btn-link text-success' type='submit'><i class=\"fas fa-folder x3\"></i> $value</button></a></form></td>
              <td>size : ".filesize($value)."bytes</td>
              <td>" .mime_content_type($value)."</td>
              <td>".date("d-m-Y H:i:s", filemtime($value))."</td>
              </tr>";

          }

           if( is_file(realpath("$value")) ){
            // affiche les fichier

            echo "<tr>

                 <td><form method='POST'><input type='hidden' name='selected' value=".$value."/>
                 <a class ='text-warning' href=".realpath($value)."><i class=\"fas fa-file x3\"></i> $value</a></form></td>
                 <td>size :".filesize($value)."bytes</td>
                 <td>".mime_content_type($value)."</td>
                 <td>".date("d-m-Y H:i:s", filemtime($value))."</td>
                 </tr>";
include_once 'ariane.php';

             }
        }
        echo "</table>";
      ?>
<?php include "gestionfichier.php" ?>
      <section class="container">
  <div class="row">
    <!-- Création de dossier -->
    <div class="col-sm p-3 mb-2 bg-dark text-white text-center rounded border border-light">
      <form class="mb-2" action="<?php  ?>" method="post">
         <label for="nom_dossier" class="text-uppercase font-weight-bold">création de dossier</label>
         <input type="text" placeholder="Nom du nouveau dossier" name="nom_dossier"><button type="submit" class="ml-1">Créer</button>
      </form>
      <?php
        echo $text_dossier;
      ?>

    </div>

    <!-- Création de fichier -->
    <div class="col-sm p-3 mb-2 bg-dark text-white text-center rounded border border-light">
      <form class="mb-2" action="<?php  ?>" method="post">
         <label for="nom_fichier" class="text-uppercase font-weight-bold">création de fichier</label>
         <input type="text" placeholder="Nom du nouveau fichier" name="nom_fichier"><button type="submit" class="ml-1">Créer</button>
      </form>
      <?php
        echo $text_fichier;
      ?>
    </div>

    <!-- Suppression de fichier -->
    <div class="col-sm p-3 mb-2 bg-dark text-white text-center rounded border border-light">
      <form class="mb-2" action="<?php  ?>" method="post">
         <label for="suppr_fichier" class="text-uppercase font-weight-bold">suppression de fichier</label>
         <input type="text" placeholder="Nom du fichier à supprimer" name="suppr_fichier"><button type="submit" class="ml-1">Supprimer</button>
      </form>
      <?php
        echo $text_suppr;
      ?>
    </div>

  </div>
</section>


      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
