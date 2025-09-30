<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
======================================================================================  
   * Stampa versamenti - ISCRITTI + ELARGITORI
     19/01/2023	a)-Numerazione unica per 'ver' e 'vel' tramite tabella:bolle-anno.
   * 02/02/23	modulo unico in A5
======================================================================================  */
           
define('FPDF_FONTPATH','font/');
require('fpdf.php');
// settaggio modulo
include 'set_ric.php';
// primo modulo
//$dat        = new data($vdata);
//$vdata      = $dat->flipdata();
$date	  		=date_create($vdata);
$vdata 	  		=date_format($date,"d/m/Y");
$disp       =0;
$registrato ="I";
require_once 'funzioni/utility.php';
define('EURO', chr(128));

include 'sup_sx.php';
include 'sup_dx_ver.php';
include 'inf_sx_ver.php';
include 'inf_dx.php';

/* secondo modulo
$disp       =150;
$registrato =" ";
include 'sup_sx.php';
include 'sup_dx_ver.php';
include 'inf_sx_ver.php';
include 'inf_dx.php';
*/
$pdf->Output();
?>
