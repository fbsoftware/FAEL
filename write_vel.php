<?php session_start();   ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.0    
   * copyright	Copyright® 2022 - 2023 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= 
   * Scrittura versamenti elargitori
   * 07/10/2017     + campo evento
   * 19/01/2023		a)-Numerazione unica per 'ver' e 'vel' tramite tabella:bolle-anno. 
   * 30/03/2023		aggiunto anno per numerazione bollette
=============================================================================*/
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";  
      
include_once 'post_vel.php';
$enume = $_POST['numero'];
$azione =$_POST['submit'];            
//print_r($_POST);//debug

// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 

switch ($azione)
{ 
case 'nuovo':
			/* a) ricava l'anno dalla data ---------------------
			$Object = new DateTime();  
			$edate = $Object->format("d-m-Y");  
			$Year = $Object->format("Y"); 
			$pr= new DB_bolle($Year);   // a)
			$pr= new DB_bolle($eanno);   // b)
            $eprog = $pr->numera(); // n.ro ricevuta
	  		$pr= new DB_ins(vel,eprog);		// b)
            $eprog = $pr->insert1(); 		// n.ro ricevuta
  // a) -------------------------------------------------------*/
			
				$pr= new DB_bolle($eanno);   // a)
               		$eprog = $pr->numera(); // n.ro ricevuta
        echo          $sql = "INSERT INTO `".DB::$pref."vel` 
                         (eid,estat,enume,edata,eimporto,enota,eprog,emezzo,
                          erife,eassnum,evento,ecausale,eanno,email)
                       VALUES (NULL,'$estat',$enume,'$edata',$eimporto,'$enota',
                               $eprog,'$emezzo','$erife','$eassnum','$evento','$ecausale','$eanno')";
               $PDO->exec($sql);    
               $PDO->commit();
               $_SESSION['esito'] = 54;
                         
// stampa ricevuta 
               //$data_str = strval($edata);
               //$anno = substr($data_str,0,4);
// definizione della causale
               if ($ecausale != '') {	 $erogazione = $ecausale; }
               else  { $erogazione = 'quale erogazione liberale anno  '.$eanno; }
               
               include 'prt_vel.php';    
               break;
   
case 'modifica':
echo            $sql = "UPDATE `".DB::$pref."vel` 
                    SET estat='$estat',enume=$enume,edata='$edata',
                    eimporto=$eimporto,enota='$enota',emezzo='$emezzo',
                    eprog=$eprog,erife='$erife',eassnum='$eassnum',evento='$evento',
                    ecausale='$ecausale', eanno='$eanno'
                    WHERE eid='$eid' ";
                    $PDO->exec($sql);    
                    $PDO->commit();
                    $_SESSION['esito'] = 55;
                         
// stampa ricevuta
                    //$data_str = strval($edata);
                    //$anno = substr($data_str,0,4);
// definizione della causale
               if ($ecausale != '') {	 $erogazione = $ecausale; }
               else  { $erogazione = 'quale erogazione liberale anno  '.$eanno; }

                    include 'prt_vel.php';
                  break;
  
case 'cancella':
            $sql = "DELETE from `".DB::$pref."vel` 
                    WHERE eid='$eid' ";
                    $PDO->exec($sql);    
                    $PDO->commit();
                    $_SESSION['esito'] = 53;
                    break;

case 'ritorno':
               $_SESSION['esito'] = 2;
               break;
               
default :      $_SESSION['esito'] = 1;
}

    $loc = "location:index.php?".$_SESSION['location']."";
         header($loc);
ob_end_flush();

echo "</html>";
?> 
