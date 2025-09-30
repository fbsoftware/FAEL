<?php session_start();   ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.0    
   * copyright	Copyright® 2022 - 2023 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================== 
   * Scrittura versamenti iscritti
   19/01/2023	a)-Numerazione unica per 'ver' e 'vel' tramite tabella:bolle-anno. 
===============================================================================*/
include_once 'include_gest.php';
$head = new getBootHead('Versamenti iscritti');
     $head->getBootHead(); 
//print_r($_POST);//debug
include_once('post_ver.php');
$azione=$_POST['submit'];

switch ($azione)
{ 
case 'nuovo':
               $pr= new DB_bolle($vanno);   // a)
               		$vprog = $pr->numera(); // n.ro ricevuta
               $sql = "INSERT INTO `".DB::$pref."ver` 
                         (vid,vstat,vnume,vdata,vimporto,vanno,vprog,vmezzo,
                          vrife,vassnum)
                      VALUES (NULL,'$vstat',$vnume,'$vdata',$vimporto,'$vanno',
                              '$vprog','$vmezzo','$vrife','$vassnum')";
                    $PDO->exec($sql);    
                    $PDO->commit();
                    $_SESSION['esito'] = 54;
                         
                         // stampa ricevuta
                          $causale='per quota associativa anno '.$vanno.' ';
                         include 'prt_ver.php';//debug
                         break;
   
case 'modifica':

          $sql = "UPDATE `".DB::$pref."ver`
                  SET vstat='$vstat',vnume='$vnume',vdata='$vdata',vimporto=$vimporto,
                      vanno=$vanno,vprog='$vprog',vmezzo='$vmezzo',vrife='$vrife',
                      vassnum='$vassnum'
                  WHERE vid=$vid";
          $PDO->exec($sql);    
          $PDO->commit();
                  $_SESSION['esito'] = 55;

                  // stampa ricevuta
					$causale='per quota associativa anno '.$vanno.' ';
                  include 'prt_ver.php';
                  break;

case 'cancella':
     $sql = "DELETE from `".DB::$pref."ver` 
                  WHERE vid=$vid";
                    $_SESSION['esito'] = 53;
                    $PDO->exec($sql);    
                    $PDO->commit();
                    break;

case 'uscita':
               $_SESSION['esito'] = 2;
               header('location:gest_ver.php');
               break;

case 'ritorno':
			$_SESSION['esito'] = 2;                       
               break;
               
               
default :      $_SESSION['esito'] = 1;
}

// aggiorna tipo socio
$tt = new DB_tipologia($vnume,$vimporto);
	$tt->upd_tipologia();
 ob_end_flush();
 
// memorizza location iniziale
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
echo "</html>";
?> 
