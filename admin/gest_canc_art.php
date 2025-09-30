<?php session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 2.0
   * copyright	Copyright (C) 2011 - 2012 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
   * ==========================================================================
   * Cancellazione di massa fra progressivi
=============================================================================*/
require_once('init_admin.php');
   //   toolbar
$param = array('cancella','chiudi');
$btx   = new bottoni_str_par('Cancellazione articoli','art','upd_canc_art.php',$param);
     $btx->btn();

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

// zona messaggi
require_once 'msg.php';

// limiti di cancellazione
 echo  "<fieldset class='fb-w50'>";
$f3 = new input(array('','progr1',10,'Parti dal progressivo:',' ','i'));
    $f3->field();
    $f3 = new input(array('','progr9',10,'Fino al progressivo:',' ','i'));
        $f3->field();
 echo  "</fieldset>";
	echo "</form>";
?>
