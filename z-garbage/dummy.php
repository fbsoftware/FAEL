<?php    session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3.4
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------------------------
   * Memorizza le scelte fatte sui filtri.
   * 1.3  scelta sul cognome anche parziale
   * 1.3.4 parametro per ritorno
=============================================================================  */
// iscritti - filtro tipo elenco alfabetico/numerico/partenza da ...
unset($_SESSION['ses_elenco']);
$_SESSION['ses_elenco']      =$_POST['sel_elenco'];
unset($_SESSION['ses_start']);
$_SESSION['ses_start']       =$_POST['sel_start'];
//print_r($_POST);//debug
header('location:'.$_POST['ritorno'].'.php');
?>
