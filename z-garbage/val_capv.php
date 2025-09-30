<?php
include_once('post_cap.php');
include_once('classi/CK.php');
$azione  =@$_POST['submit'];
$ck = new CK($ccod);  $ck->esiste();
$cj = new CK($cdesc); $cj->esiste();
//------------------------------------------------------
//if(!$ck || !$cj)		
//{	
echo "<form action='upd_capv.php' method='post'>";  	
if(!$ck)   
{  
echo "<input type='hidden' name='ccod_err' value='Ins.codice capitolo'>";  }
if(!$cj)   
{  echo "<input type='hidden' name='cdesc_err' value='Ins.descrizione '>";   }
echo "<input type='hidden' name='cprog' value=$cprog >";
echo "<input type='hidden' name='cstat' value=$cstat >";                    
echo "<input type='hidden' name='ccod' value=$ccod >";                
echo "<input type='hidden' name='cdesc' value=$cdesc >";
echo "<button type='button' name='submit' value=$azione >Validare</button>";

echo "<script type='text/javascript'>document.valcap.submit(); </script>";
echo "</form>";
/*       }
else
           {
echo "<form action='upd_capv.php' type='hidden' method='post'>"; 
echo "<input type='hidden' name='ccod' value=$ccod >";
echo "<input type='hidden' name='cdesc_err' value='Ins.codice capitolo'>";  
echo "<script type='text/javascript'> document.valcap.submit(); </script>";
echo "</form>";
       } */
?>