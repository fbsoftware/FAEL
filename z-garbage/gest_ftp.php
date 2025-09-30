<?php  session_start(); 
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 2.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------------------------*/
echo  "<!DOCTYPE html><html><head>";
echo  "<script src='js/jscolor.js'></script>";   
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
echo  "</head><body>"; 
include_once('classi/DB.php');
$db2 = new DB('sito');  $db2->config();  $db2->openDB(); 
include_once('classi/bottoni.php');  
include_once('classi/DB_tip.php');
include_once('classi/DB_tip_i.php');
include_once('classi/field.php');
include_once('classi/DB_sel.php');
include_once('classi/DB_sel_l.php');
 
//   bottoni gestione
$btx = new bottoni_str('Caricamento Template','ftp');       $btx->bt_upload_ftp();
// zona messaggi
if(isset($_SESSION['else'])) 
     {
     echo "<div class='msg'>";
     if (@$_SESSION['else'] == 1) {echo "Template caricato con successo";}  
     if (@$_SESSION['else'] == 0) {echo "Errori nel caricamento del template";}        
     unset($_SESSION['else']);
     echo "</div>"; 
     }
    
// dati del template
echo "<fieldset >"; 
echo "<input type='file' name='file' size='100'><br /><hr /><br />";
$f3 = new field('','ttipo',1,'Tipo menu [1,2,3]');          $f3->field_ir();
$men = new DB_sel_l('mnu','bprog','','bmenu','ttdesc','bstat','bmenu','Menu top');
     $men->select_label();
$f6 = new field('','tdesc',50,'Descrizione');               $f6->field_ir();
$t1 = new DB_tip_i('pos','tcol1','','Posizione 1');         $t1->select();
$t2 = new DB_tip_i('pos','tcol2','','Posizione 2');         $t2->select();
$t3 = new DB_tip_i('pos','tcol3','','Posizione 3');         $t3->select();
$tm = new DB_tip_i('pos','tmenu','','Posizione Menu top');  $tm->select();
$fb = new field('FFFFFF','tcolscu',6,'Colore scuro bordo'); $fb->field_ic();
$fc = new field('000000','tcolchi',6,'Colore chiaro bordo');$fc->field_ic();

echo "</fieldset></form>";
echo "</body></html>";
?>
