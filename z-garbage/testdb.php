<?php
include_once('classi/DB.php');
$db1      = new DB('sito');  $db1->openDB();  DB::config();
$tipo     = $_SESSION['pag'];

  $sql="EXPLAIN SELECT * FROM `".DB::$pref."isc` 
                 WHERE stato = 'I' 
                 ORDER BY cognome,nome";
$res = mysql_query($sql) ;  
      while($row = mysql_fetch_array($res))  
            { 
                include('fields_isc_p.php'); 
                echo $numero_iscrizione."<br>";
                          }               
?>
