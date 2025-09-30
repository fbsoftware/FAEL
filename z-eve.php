<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Gestione versamenti elargitori - inserimento e ricerca
   * 07/10/2017     gestione evento
============================================================================= */
echo "<!DOCTYPE <html></head>";
echo "<link rel='stylesheet' type='text/css' href='css/style.css'>
     <link rel='stylesheet' href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css' />
     <script src='http://code.jquery.com/jquery-1.9.1.js'></script>
     <script src='http://code.jquery.com/ui/1.10.2/jquery-ui.js'></script> 
     <script src='js/date_picker_it.js'></script>";
echo "<head>";
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');
$db2 = new DB('sito');   $db2->openDB(); 
     $tc = new DB_tip_i('eve','evento',NULL,'Evento');              
          $tc->select();
?>