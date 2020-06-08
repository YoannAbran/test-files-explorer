<?php

// Fonction fildarianise
function fildarianise(&$titres, $separateur=' > ')
{

   $baseUrl = 'http://'.$_SERVER['HTTP_HOST'];
   $retour = '<span class="ariane"><a href=' . $baseUrl . '>' . $titres[0] . '</a>';
   $chemin = explode("/", substr($_SERVER['PHP_SELF'], 1));

   if (is_array($chemin)) foreach ($chemin as $k=>$v) if ($titres[$v] !== false)
   {
      $baseUrl .= "/$v";
      $titre = isset($titres[$v]) ? $titres[$v] : $v;
      $retour .= $separateur . '<a href=' . $baseUrl . '>' . $titre . '</a>';
   }
   $retour .= '</span>';
   return $retour;
}

// Un essai...
$titres = array(0=>'accueil', 'cat1'=>'Catégorie 1', 'cat2'=>'Categorie 2', 'contact.php'=>'Contact', 'index.php'=>false);
echo fildarianise($titres);

?>
