<?php session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3
   * copyright	Copyright (C) 2011 - 2012 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
   * ========================================================================
   * Scrive il nuovo articolo.
   01/12/2021 record avanti.
============================================================================= */
require_once('init_admin.php');
require_once('post_art.php');
$azione =$_POST['submit'];
print_r($_POST);//debug

// test validità titolo/descrizione
if (($azione == 'cancella') && ($_POST['progr1'] > $_POST['progr9']))
          {
          $_SESSION['errore'] = 1;
          $_SESSION['errore6'] = 1;
          $loc = "location:admin.php?".$_SESSION['location']."  ";
          header($loc);
          }

switch ($azione)
{
case 'chiudi':
               {
               $_SESSION['esito'] = 2;
               $loc = "location:admin.php?".$_SESSION['location']." ";
               header($loc);
               break; }

case 'cancella':
               {
  echo             $sql= ("DELETE FROM `".DB::$pref."art`
                WHERE `aprog` >= ".$_POST['progr1']."
                AND   `aprog` <= ".$_POST['progr9']."  ");
               $PDO->exec($sql);
               $PDO->commit();
               $_SESSION['esito'] = 53;
               $loc = "location:admin.php?".$_SESSION['location']."  ";
                    header($loc);
               break; }

default :      $_SESSION['esito'] = 0;
$loc = "location:admin.php?".$_SESSION['location']."  ";
     header($loc);
}


?>
