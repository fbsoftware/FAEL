<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
=============================================================================  */

echo  "<link rel='stylesheet' type='text/css' href='CSS/style.css'>";
include_once('classi/DB.php');
use classi\DB;
$db1 = new classi\DB('sito');  $db1->openDB();  DB::config();             
include_once('classi/bottoni.php');  
include_once('classi/stato.php');
include_once('classi/fieldt.php');
include_once('classi/fieldi.php');

 //   bottoni gestione
$btx = new bottoni_str('Gestione iscritti','iscritti');     $btx->bt_gest();

// zona messaggi
include_once('msg.php');
  
// mostra la tabella filtrata --------------------------------------------------
echo    "<div class='tabella'><fieldset >";
      $fa = new fieldt('Sc',1);                   $fa->field(); 
      $fz = new fieldt('Nr',2);                   $fz->field();
      $fb = new fieldt('Cognome',25);             $fb->field();
      $fc = new fieldt('Nome',25);                $fc->field();
      $fd = new fieldt('Indirizzo',30);           $fd->field();
      $fe = new fieldt('cap',5);                  $fe->field();
      $fg = new fieldt('Localit&agrave;',25);     $fg->field();      
      $ff = new fieldt('Prov',2);                 $ff->field();
echo "<br >";       
    $sql = "SELECT * FROM `".DB::$pref."iscritti` ORDER BY numero_iscrizione";
    $result = mysql_query($sql);
if (mysql_num_rows($result))
{
    while($row = mysql_fetch_array($result))
  { 
     include('fields_iscritti.php'); 
     echo "<input type='checkbox' name='scelta' value ='$numero_iscrizione'>"; 
     $f1 = new fieldi($numero_iscrizione,'scelta',11);     $f1->field_r(); 
     $st = new fieldi($cognome,'cognome',25);                         $st->field_r();   
     $f2 = new fieldi($nome,'nome',25);                               $f2->field_r();  
     $f3 = new fieldi($indirizzo,'indirizzo',30);                     $f3->field_r();
     $f4 = new fieldi($cap,'cap',5);                                  $f4->field_r();
     $f6 = new fieldi($localita,'localita',25);                       $f6->field_r();  
     $f5 = new fieldi($prov,'provincia',2);                           $f5->field_r();
     echo "<br >";  
  } 
}
echo "</form></fieldset></div>";
?> 