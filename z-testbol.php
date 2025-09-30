<?php
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>"; 
	 $anno=2023;
$num = new DB_bolle($anno);
$max = $num->numera();
echo "<br />il numero è =".$max;
?>