<?php
// Création de dossier
if (empty($_POST["nom_dossier"])) {
  $text_dossier = "Indiquer le nom du dossier à créer.";
}
else {
    $nouveau_dossier = $_POST["nom_dossier"]; // variable se créé après avoir vérifier si le champ est vide ou pas
    if (file_exists($nouveau_dossier) && is_dir($nouveau_dossier)) {
      $text_dossier = "Le dossier $nouveau_dossier existe déjà.";
    }
    else {
      mkdir($nouveau_dossier);
      if (file_exists($nouveau_dossier) && is_dir($nouveau_dossier)) {
        $text_dossier = "Le dossier $nouveau_dossier a bien été créé.";
      }
    }
  }

// Création de fichier
if (empty($_POST["nom_fichier"])) {
  $text_fichier = "Indiquer le nom du fichier à créer.<br>(il sera créé en .txt)";
}
else {
    $nouveau_fichier = $_POST["nom_fichier"]; // variable se créé après avoir vérifier si le champ est vide ou pas
    if (file_exists($nouveau_fichier.".txt") && !is_dir($nouveau_fichier.".txt")) {
      $text_fichier = "Le fichier $nouveau_fichier.txt existe déjà.";
    }
    else {
      touch($nouveau_fichier.".txt");
      if (file_exists($nouveau_fichier.".txt") && !is_dir($nouveau_fichier.".txt")) {
        $text_fichier = "Le fichier $nouveau_fichier.txt a bien été créé.";
      }
    }
  }

// Suppression de fichier
if (empty($_POST["suppr_fichier"])) {
  $text_suppr = "Indiquer le nom du fichier à supprimer avec son extension (par ex. : fichier.txt).";
}
else {
    $del_fichier = $_POST["suppr_fichier"]; // variable se créé après avoir vérifier si le champ est vide ou pas
    if (!file_exists($del_fichier)) {
      $text_suppr= "Le fichier $del_fichier n'existe pas.";
    }
    else {
      if (is_dir($del_fichier)) {
        $text_suppr= "$del_fichier est un dossier et non un fichier.";
      }
      else {
        unlink($del_fichier);
        if (!file_exists($del_fichier)) {
          $text_suppr = "Le fichier $del_fichier a bien été supprimé.";
        }
      }
    }
  }
