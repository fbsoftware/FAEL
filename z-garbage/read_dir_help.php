<?php session_start(); 
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */
include_once('classi/DB.php');
$db1 = new DB('sito');              
$db1->config();

echo   "<br ><h2>Gestione testi di help</h2><br >";

if ($handle = opendir(DB::$path_help))   
{
      echo    "<input size='30' disabled='disabled' value='file' ><br >";
      
      echo    "<form method='post' action='tiny_h.php'>";      
      echo    "<input type='text'  size='30' name='file' value=''>";
      echo    "<button type='submit' name='submit' value='inserimento' ><img src='images/new_f1.png' height='15' ></button>";
      echo    "</form>";
    while (false !== ($text = readdir($handle))) 
    {
      if ($text != "." && $text != "..") 
      {
      echo "<form method='post' action='tiny_h.php'>";      
      echo "<input type='text'  size='30' name='file' value='$text' >";
      echo "<button type='submit' name='submit' value='modifica'><img src='images/edit_f2.png' height='15' ></button>";
      echo "<button type='submit' name='submit' value='cancella'><img src='images/cancel_f2.png' height='15' ></button>";
      echo "</form>";
      }
    }
    echo
    closedir($handle);
}

?> 
