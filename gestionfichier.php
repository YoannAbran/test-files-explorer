<?php
if (!empty($_GET['dir'])){
$chemindoss = $_GET['dir'];
}
// Création de dossier

if (empty($_POST["nom_dossier"])) {
  $text_dossier = "Indiquer le nom du dossier à créer.";
}
else {
    $nomdossier = $_POST["nom_dossier"];
    $nouveau_dossier = $chemindoss.'/'.$nomdossier; // variable se créé après avoir vérifier si le champ est vide ou pas
    if (file_exists($nouveau_dossier) && is_dir($nouveau_dossier)) {
      $text_dossier = "Le dossier $nomdossier existe déjà.";
    }
    else {
      mkdir($nouveau_dossier,0777,true);
      if (file_exists($nouveau_dossier) && is_dir($nouveau_dossier)) {
        $text_dossier = "Le dossier $nomdossier a bien été créé.";
      }
    }
  }

// Création de fichier
if (empty($_POST["nom_fichier"])) {
  $text_fichier = "Indiquer le nom du fichier à créer.<br>(il sera créé en .txt)";
}
else {
    $nomcrefichier = $_POST["nom_fichier"];
    $nouveau_fichier = $chemindoss.'/'.$nomcrefichier; // variable se créé après avoir vérifier si le champ est vide ou pas
    if (file_exists($nouveau_fichier.".txt") && !is_dir($nouveau_fichier.".txt")) {
      $text_fichier = "Le fichier $nomcrefichier.txt existe déjà.";
    }
    else {
      fopen($nouveau_fichier.".txt","x+");
      if (file_exists($nouveau_fichier.".txt") && !is_dir($nouveau_fichier.".txt")) {
        $text_fichier = "Le fichier $nomcrefichier.txt a bien été créé.";
      }
    }
  }

// Suppression de fichier
if (empty($_POST["suppr_fichier"])) {
  $text_suppr = "Indiquer le nom du fichier à supprimer avec son extension (par ex. : fichier.txt).";
}
else {
    $nomdelfichier =$_POST["suppr_fichier"];
    $del_fichier = $chemindoss.'/'.$nomdelfichier; // variable se créé après avoir vérifier si le champ est vide ou pas
    if (!file_exists($del_fichier)) {
      $text_suppr= "Le fichier $nomdelfichier n'existe pas.";
    }
    else {
      if (is_dir($del_fichier)) {
        $text_suppr= "$nomdelfichier est un dossier et non un fichier.";
      }
      else {
        unlink($del_fichier);
        if (!file_exists($del_fichier)) {
          $text_suppr = "Le fichier $nomdelfichier a bien été supprimé.";
        }
      }
    }
  }
