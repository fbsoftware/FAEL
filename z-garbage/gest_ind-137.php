<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * gestione - INDIRIZZI
=============================================================================  */
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

$db1 = new DB('sito');  $db1->openDB(); 
$tipo= $_SESSION['pag'];
?>
<!DOCTYPE html>
<head>
     <link rel='stylesheet'  type='text/css'  href='css/style.css'>
     <link rel="stylesheet"  type="text/css"  href="css/jquery-ui-1.8.20.custom.css" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>
        <script type="text/javascript">
            $(function()
            {
                $( "#alfa" ).autocomplete(
                    {
                    source: "i_alfa.php",
                    select: function(event, ui)
                         {
                         $('#id').val(ui.item.id);
                         }
                    });
               $( "#nume" ).autocomplete(
                    {
                    source: "i_nume.php",
                    select: function(event, ui)
                         {
                         $('#id').val(ui.item.id);
                         }
                    });
          });
        </script>

</head>

<?php

 //   bottoni gestione
      $btx = new bottoni_str('Gestione indirizzi','ind');         $btx->bt_gest_a();

// zona messaggi
     include_once('msg.php');

// autocomplete
?>
        <p>Per Cognome:
        <input type="text" id="alfa" style="width:400px;">
         &nbsp; Per Numero:
        <input type="text" id="nume" style="width:400px;">
        <input type="hidden" name="id" id="id" />
        </p>


     <div id='elenco'>  </div>
    </div></form>
