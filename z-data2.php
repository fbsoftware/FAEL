<?php

include_once 'include_gest.php';
// DOCTYPE & head
$head = new getBootHead('gestione versamenti iscritti');
     $head->getBootHead();
echo "<script src='js/FBbase.js'></script> ";     
     $fq = new input(array(' ','data_iscrizione',12,'Data iscrizione','Data iscrizione','d1')); 
               $fq->field();     
     $fq = new input(array(' ','data_iscrizione',12,'Data iscrizione','Data iscrizione','d2')); 
               $fq->field();
     $fq = new input(array(' ','data_iscrizione',12,'Data iscrizione','Data iscrizione','d3')); 
               $fq->field();
?>