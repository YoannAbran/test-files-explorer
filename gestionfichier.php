<?php
// Vérifie si la variable $_GET n'est pas vide et création d'une variable pour le chemin
if (!empty($_GET['dir'])){
$chemindoss = $_GET['dir'];
}
else {
  $chemindoss = getcwd();
}


// Création de dossier

// Vérifie si le $_POST est vide
if (empty($_POST["nom_dossier"])) {
  $text_dossier = "Indiquer le nom du dossier à créer.";
}
else {
// récup du nom du dossier
    $nomdossier = $_POST["nom_dossier"];
// création du chemin de création
    $nouveau_dossier = $chemindoss.DIRECTORY_SEPARATOR.$nomdossier;
//vérifier si le dossier existe et que c'est un dossier
    if (file_exists($nouveau_dossier) && is_dir($nouveau_dossier)) {
      $text_dossier = "Le dossier $nomdossier existe déjà.";
    }
    else {
//création du dossier
      mkdir($nouveau_dossier,0777,true);
// verifie si le dossier existe et créé message pour dire que le dossier à bien été créer
      if (file_exists($nouveau_dossier) && is_dir($nouveau_dossier)) {
        $text_dossier = "Le dossier $nomdossier a bien été créé.";
      }
    }
  }

// Création de fichier
// Vérifie si le $_POST est vide
if (empty($_POST["nom_fichier"])) {
  $text_fichier = "Indiquer le nom du fichier à créer.<br>Préciser l'extension du fichier.<br>";
}
else {
// récup du nom du fichier
    $nomcrefichier = $_POST["nom_fichier"];
// création du chemin de création
    $nouveau_fichier = $chemindoss.DIRECTORY_SEPARATOR.$nomcrefichier;
//vérifier si le fichier existe et que ce n'est pas un dossier
    if (file_exists($nouveau_fichier) && !is_dir($nouveau_fichier)) {
      $text_fichier = "Le fichier $nomcrefichier existe déjà.";
    }
    else {
//création du fichier
      fopen($nouveau_fichier,"x+");
//verifie si le fichier existe et créé un message pour dire que le fichier à bien été créer
      if (file_exists($nouveau_fichier) && !is_dir($nouveau_fichier)) {
        $text_fichier = "Le fichier $nomcrefichier a bien été créé.";
      }
    }
  }

// Suppression de fichier et dossier

// Vérifie si le $_POST est vide
if (empty($_POST["suppr_fichier"])) {
  $text_suppr = "Indiquer le nom du fichier à supprimer avec son extension (par ex. : fichier.txt).";
}
else {
// récup du nom du fichier
    $nomdelfichier =$_POST["suppr_fichier"];
// chemin complet du fichier pour suppression
    $del_fichier = $chemindoss.DIRECTORY_SEPARATOR.$nomdelfichier;
    if (!file_exists($del_fichier)) {
//vérifie si le fichier existe
      $text_suppr= "Le fichier $nomdelfichier n'existe pas.";
    }
    else {
//verifie si c'est un dossier
      if (is_dir($del_fichier)) {
//supprie le dossier
        rmdir($del_fichier);
        $text_suppr = "le dossier $nomdelfichier a bien été supprimé.";
      }
      else {
//si c'est pas un dossier supprime le fichier
        unlink($del_fichier);
        if (!file_exists($del_fichier)) {
//vérifie si le fichier existe plus et créé un message
          $text_suppr = "Le fichier $nomdelfichier a bien été supprimé.";
        }
      }
    }
  }
