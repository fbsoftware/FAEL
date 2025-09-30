<?php    session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 2.0   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------------------------
   * Memorizza le scelte fatte sui filtri per tabelle database.
=============================================================================  */

// filtro tabelle
 $ses_mod  =$_POST['table'];
         if ($ses_mod != '') 
         {$_SESSION['ses_mod'] = $ses_mod; 
         header('location:index.php?forma=Utility&sub=Struttura_DB&content=htm&dati=struct_db.php&pag=');
         }
?>
