<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa badge - versione 2023 (12/04/2023)
=============================================================================  */
?>
      

</head>

<?php
 //   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par('Badge borsisti','isc','prt_badge.php',$param);     
     $btx->btn();

// zona messaggi
include_once('msg.php');

// --------------- scelta da select -----------------------------
echo  "<fieldset>";
echo "<form method='post' action='upd_isc.php?pag=".$tipo."'>";
echo "<div class='col-md-4'>" ;
     $fg = new input(array('','titolo',25,'Titolo',' ','i'));                            
          $fg->field();
     $fg = new input(array('','nome',25,'Nome e cognome',' ','i'));                            
          $fg->field();
     $fg = new input(array('','tipo',25,'Mansione',' ','i'));                            
          $fg->field();
echo "</form>"; 
echo "</fieldset>";  
?>