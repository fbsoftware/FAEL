<?php
echo date("d-m-Y");
$date = '2017-05-25';

$original_date = "2019-03-31";
// Creating timestamp from given date
$timestamp = strtotime($original_date);
// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);
echo "NUOVA DATA=".$new_date; // Outputs: 31-03-2019
$timestamp=strtotime($data_uscita);
echo "<br>data archiviazione=".$datau = date("d-m-Y", $timestamp);  //debug 
?>