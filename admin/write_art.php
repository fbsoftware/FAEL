<?php session_start();
/**
  Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
    package		FB open template
    versione 1.3
    copyright	Copyright (C) 2011 - 2012 FB. All rights reserved.
    license		GNU/GPL
    Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
    all'uso anche improprio di FB open template.
    ========================================================================
    Scrive il nuovo articolo.
   01/12/2021 record avanti.
============================================================================= */
require_once('init_admin.php');
require_once('post_art.php');
$azione =$_POST['submit'];
//print_r($_POST);//debug

/** test validità titolo/descrizione
if (($atit <= "") && ($azione != 'cancella') && ($azione != 'ritorno'))
          {
          $_SESSION['errore'] = 1;
          $_SESSION['errore4'] = 1;
          }
*/
switch ($azione)
{
case 'ritorno':
               {
               $_SESSION['esito'] = 2;
               $loc = "location:admin.php?".$_SESSION['location']."  ";
               header($loc);
               break; }

case 'avanti' :
echo $aid;//debug
      $loc = "location:upd_art.php?ID=$aid&NEW_AZ=avanti";
      header($loc);
      break;

      case 'indietro' :
      echo $aid;//debug
            $loc = "location:upd_art.php?ID=$aid&NEW_AZ=indietro";
            header($loc);
            break;

case 'nuovo' :
               {
  echo             $sql = "INSERT INTO `".DB::$pref."art`
                    ( `aid`,`astat`,`aprog`,`acod`,`atit`,`ades`,`aprez`,`aflag`,`aimg`,`acat`)
               VALUES (NULL ,'$astat','$aprog','$acod','$atit','$ades','$aprez','$aflag','$aimg','$acat') ";
               $PDO->exec($sql);
               $PDO->commit();
               $_SESSION['esito'] = 54;
               $loc = "location:admin.php?".$_SESSION['location']."  ";
                    header($loc);
               break;
               }

case 'modifica' :
               {
   echo            $sql = ("UPDATE `".DB::$pref."art`
                         SET `astat`='$astat',
						 `aprog`='$aprog',
						 `acod`='$acod',
						 `atit`='$atit',
						 `ades`='$ades',
						 `aprez`='$aprez',
						 `aimg`='$aimg',
						 `acat`='$acat',
						 `aflag`='$aflag'
                         WHERE `aid` = '$aid' ");
               $PDO->exec($sql);
               $PDO->commit();
               $_SESSION['esito'] = 55;
               $loc = "location:admin.php?".$_SESSION['location']."  ";
                    header($loc);
               break;
               }

case 'cancella':
               {
  echo             $sql= ("DELETE FROM `".DB::$pref."art` where `aid` = '$aid' ");
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
