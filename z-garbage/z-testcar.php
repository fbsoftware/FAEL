<?php
include_once('classi/DB.php');
$db1      = new DB('sito');  $db1->openDB();  DB::config(); 
$car = new DB_decod2('xdb','xstat','xtipo','xcod','car','8','xdes');
$carica = $car->decod2(); 
echo "Carica 8 =".$carica;
$anno =date('Y') ;
echo  "<br />anno=".$anno;
?>
