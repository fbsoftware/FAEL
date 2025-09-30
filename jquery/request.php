<?php
// Il testo passato in post che vogliamo far uscire all'interno del nostro alert
//print_r($_POST);
$testo_alert = $_POST['variabile'];
 
// Assegnamo la variaible possono anche essere passati più variabili attraverso un array del tipo:
// $risposta_json['alert_titolo'] = 'Esempio PHP jQuery';
// $risposta_json['alert_testo'] = 'Hello World!';
 $risposta_json = $testo_alert;
 
// Come vi dicevo ora facciamo un encode json della variabile per far si che venga interpretata da jQuery
echo json_encode($risposta_json); 
?>