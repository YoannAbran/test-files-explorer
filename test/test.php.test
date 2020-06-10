<?php
$order = isset($_GET['order']) ? $_GET['order'] : '';
$order0 = isset($_GET['order0']) ? $_GET['order0'] : '';
$dir = isset($_GET['dir']) ? $_GET['dir'] : '';
$asc = isset($_GET['asc']) ? $_GET['asc'] : '';

/* racine */
$BASE = './';
/* infos à extraire */
function addScheme($entry,$base,$type) {
$tab['name'] = $entry;
$tab['type'] = filetype($base.'/'.$entry);
$tab['date'] = filemtime($base.'/'.$entry);
$tab['size'] = filesize($base.'/'.$entry);
$tab['perms'] = fileperms($base.'/'.$entry);
$tab['access'] = fileatime($base.'/'.$entry);
$t = explode('.', $entry);
$tab['ext'] = $t[count($t)-1];
return $tab;
}
/* liste des dossiers */
function list_dir($base, $cur, $level=0) {
global $BASE, $order, $asc;
if ($dir = opendir($base)) {
$tab = array();
while($entry = readdir($dir)) {
if(is_dir($base.'/'.$entry) && !in_array($entry, array('.','..'))) {
$tab[] = addScheme($entry, $base, 'dir');
}
}

foreach($tab as $elem) {
$entry = $elem['name'];
/* chemin relatif à la racine */
$file = $base.'/'.$entry;
/* marge gauche */
for($i=1; $i<=(4*$level); $i++) {
echo ' ';
}
if($file == $cur) {
echo " $entry<br />\n";
} else {
echo
"  <a href=\"$_SERVER[PHP_SELF]?dir=".
rawurlencode($file)."&order=$order&asc=$asc\">$entry</a><br />\n";
}
if(preg_match("#".$file.'/#',$cur.'/')) {
list_dir($file, $cur, $level+1);
}
}
closedir($dir);
}
}
