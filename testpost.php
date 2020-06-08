<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    $dossier = getcwd();
    $contenu= scandir($dossier);

    foreach ($contenu as $value) {

    if (is_dir(realpath($value))) {
    echo "<form method='POST' action=''>";
    echo "<input type='submit' name='selected' value='".$value."'>";
    echo "</form>";
    }
    else {
    echo "file <br>";
    }
    if (isset($_POST['selected']))
    {
    $selected =$_POST['selected'];

    echo $selected;
    }
    }

      ?>
  </body>
</html>
