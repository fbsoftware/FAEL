<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * elenco iscritti filtrato
=============================================================================  */

// $ses_elenco;
if ($ses_elenco == 'alfa')
          {
           echo "<div class='crea'><fieldset>";
           echo "<select name='id' size='20'>";
           $sql="SELECT * FROM `".DB::$pref."isc`
                 WHERE stato = '$tipo'
                 ORDER BY cognome,nome ";
           $res2 = mysql_query($sql);
           if (!$res2) die('elenco:'.mysql_error());
           while($row = mysql_fetch_array($res2))
            {
               include('fields_isc.php');
               echo "<option value='$id'>$cognome $nome - ($numero_iscrizione)</option>";
            }
           echo "</select></fieldset></div>";
           echo "</form>";
           }
//------- in ordine numerico -----------------------------
if ($ses_elenco == 'nume')
          {
          echo "<div class='crea'><fieldset>";
          echo "<select name='id' size='20'>";
          $sql="SELECT * FROM `".DB::$pref."isc`
                WHERE stato = '$tipo'
                ORDER BY numero_iscrizione ";
          $res2 = mysql_query($sql);
          if (!$res2) die('elenco:'.mysql_error());
          while($row = mysql_fetch_array($res2))
            {
               include('fields_isc.php');
               echo "<option value='$id'>$numero_iscrizione - $cognome $nome</option>";
            }
          echo "</select></fieldset></div>";
          echo "</form>";
          }
//------- partenza da ... -----------------------------
if ($ses_elenco == 'start')
          {
          echo "<div class='crea'><fieldset>";
          echo "<select name='id' size='20'>";
          $sql="SELECT * FROM `".DB::$pref."isc`
                WHERE stato = '$tipo'  and cognome LIKE '".$ses_start."%'
                 ORDER BY cognome,nome ";
          $res2 = mysql_query($sql);
          if (!$res2) die('elenco:'.mysql_error());
          while($row = mysql_fetch_array($res2))
            {
               include('fields_isc.php');
               echo "<option value='$id'>$cognome $nome - ($numero_iscrizione)</option>";
            }
          echo "</select></fieldset></div>";
          echo "</form>";
          }

?>