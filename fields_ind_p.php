<?php
include_once 'funzioni/utility.php';
$id                 =$row['id'];
$stato              =$row['stato'];
$numero             =$row['numero'];
$titolo             =$row['titolo'];
$titolo_plus        =$row['titolo_plus'];
$RagioneSociale     =utf8_decode($row['RagioneSociale']);
$referente          =utf8_decode($row['referente']);
$indirizzo          =utf8_decode($row['indirizzo']);
$cap                =$row['cap']; 
$localita           =utf8_decode($row['localita']);
$provincia          =$row['provincia'];
$telefono           =$row['telefono'];
//$data_inserimento   = flipData($row['data_inserimento']);
$date	  =date_create($row['data_inserimento']);
$data_inserimento 	  =date_format($date,"d/m/Y");
$stampa             =$row['stampa'];
$note               =utf8_decode($row['note']);
?>
