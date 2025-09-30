<?php
include_once 'include_gest.php';
$tipo         = $_SESSION['pag']; 
// DOCTYPE & head
 $head = new getBootHead('gestione iscritti');
      $head->getBootHead();
      
$f1 = new input(array(NULL,'alfa',20,'Per Cognome:','Ordine alfabetico per cognome','i'));     
     $f1->field();
$f1 = new input(array(NULL,'alfa',20,NULL,'Ordine alfabetico per cognome','i'));     
     $f1->field();
     
$f1 = new fieldi('campo-1','vid',20);             
      $f1->field_i();
$f1 = new fieldi('campo-2','vid',20);             
      $f1->field_i();
echo "<br />";      
$f1 = new fieldt('Scelta',20);             
     $f1->field(); 
?>