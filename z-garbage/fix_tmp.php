<?php session_start();
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Fissa il template attivo per il sito
   * Se deve aggiornare:   
   * - pulisce il flag di selezionato template   
   * - assegna con '*' in base al parametro postato poi chiude il frame 
   * - altrimenti (ritorno) chiude solo il frame  
 ============================================================================*/
include_once('classi/DB.php');

$dbase = new DB('sito');   $dbase->openDB();     
 
$num    = $_POST['scelto']; 
$return = $_POST['submit'];

switch($return)
{
case 'Conferma':
echo "UPDATE ".DB::$pref."tmp SET tsel =' ' ";     
echo "UPDATE ".DB::$pref."tmp SET tsel ='*' WHERE tprog='$num'" ;

     $result = mysql_query("UPDATE ".DB::$pref."tmp  
                            SET tsel =' ' ")
             or die ('fix_tmp/conferma:'.mysql_error());   // pulisce
     $result = mysql_query("UPDATE ".DB::$pref."tmp  
                            SET tsel ='*'  
                            WHERE tprog='$num'")
                            or die ('fix_tmp/conferma:'.mysql_error());   // seleziona
     $url='';
     $iframe='';
     header('location:change_tmp.php') ;
     break;
  
case 'Ritorno':
     $url='';
     $iframe='';
     $forma='';
     header('location:change_tmp.php') ;
} 
?>
