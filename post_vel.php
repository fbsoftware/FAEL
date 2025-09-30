<?php
// adeguamento delle date e degli importi decimali
// aggiunto: ecausale (15/3/18)
// aggiunto anno (29/03/2023)
// -----------------------------------------------
$eid           =$_POST['eid']; 
$estat         =$_POST['estat'];
$enume         =$_POST['enume'];  
$date	  		=date_create($_POST['edata']);
$edata 	  		=date_format($date,"d/m/Y");
$eimporto  		= number_format($_POST['eimporto'],2,'.','');    // edit decimale x MySQL
$eprog         =$_POST['eprog'];
$emezzo        =$_POST['emezzo'];
$erife         =$_POST['erife']; 
$eassnum       =$_POST['eassnum'];
$ecausale 		=$_POST['ecausale'];
$enota         	=$_POST['enota'];
$evento        	=$_POST['evento'];
$eanno    		=$_POST['eanno'];                 
?>