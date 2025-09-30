<?php
include_once('classi/bottoni.php');
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";

//   bottoni gestione
$param    = array();
$param    = array( 'Nuova gestione dei bottoni','tmp','nuovo','modifica','cancella','chiudi','archivia','uscita','cerca','mostra','stampa','ripristina','salva');  
$btx = new bt_param($param);     $btx->show_bottoni($param);

?>
