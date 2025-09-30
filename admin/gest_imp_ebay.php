<?php   session_start();       ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3
   * copyright	Copyright (C) 2019 - 2020 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
   *-------------------------------------------------------------------------
   * 24/03/2021		acquisisce file.csv per articoli per Ebay
============================================================================= */
require_once('init_admin.php');
     $param = array('carica|nuovo','chiudi','enctype');
     $btx   = new bottoni_str_par('Acquisizione articoli','art','upd_imp_ebay.php',$param);
          $btx->btn();

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

// zona messaggi
require'msg.php';

// file da importare
echo "<fieldset style='width:30%;'>";
echo "<input type='file' name='myfile' id='myfile' >";
echo "</fieldset>";
echo "</form>";
?>
