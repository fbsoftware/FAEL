<?php   session_start();       ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3
   * copyright	Copyright (C) 2019 - 2020 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
   *-------------------------------------------------------------------------
   * 22/01/2022	creato per poetr confermare la cancellazione
============================================================================= */
require_once('init_admin.php');
require_once('post_xdb.php');
$azione  =$_POST['submit'];

switch ($azione)
{
// chiudi
case 'chiudi':
               {
               $_SESSION['esito'] = 2;
               $loc = "location:admin.php?".$_SESSION['location']." ";
               header($loc);
               break; }

// cancellazione
    case 'cancella' :
          $param  = array('cancella','ritorno');
          $btx    = new bottoni_str_par($DELCONF,'art','write_canc_art.php',$param);
               $btx->btn();

// limiti di cancellazione
echo  "<fieldset class='fb-w50'>";
$f3 = new input(array($_POST['progr1'],'progr1',10,'Parti dal progressivo:',' ','rb'));
    $f3->field();
$f3 = new input(array($_POST['progr9'],'progr9',10,'Fino al progressivo:',' ','rb'));
    $f3->field();
echo  "</fieldset>";
echo    "</form>";
      break;

    default:
  echo "Operazione invalida";
}
echo "</body>";
ob_end_flush();
?>
