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
global $numg;

// lettura directory
$a  =   DB::$dir_cont;       //imposto la variabile della directory dei testi
$f=opendir(DB::$root.DB::$sep.DB::$site.DB::$sep.$a);    //apro la directory
    while(false!==($g=readdir($f)))                     // legge dentro la directory fino a  valore false
    {   
        if($g!="." && $g!="..")                         //elimino il punto ed i doppi punti
        {    
            if(is_dir(DB::$root.DB::$sep.DB::$site.DB::$sep.$a.$g))     // dir/subdir
            {    
            $array_dir[]=$g;                                               // array dir
            }
                if(is_file(DB::$root.DB::$sep.DB::$site.DB::$sep.$a.$g))// dir/file
                {
                $array_file[]=$g;;   
                $numg++;                    //numero di file trovati
                }
        }
    }
closedir($f);               //chiudo la directory

// titolo e riga di inserimento
echo    "<br ><fieldset><legend> Testi dei contenuti </legend>";
echo    "<input size='30' disabled='disabled' value='Titolo'><a href='help00.php?file_h=testi/help04.txt' target='_self'>
        <img src='images/con_info.png' height='15'></a>&nbsp;Aiuto
        <form method='post' action='tiny.php'>
        <input class='titolo' type='text'  size='30' name='file' value=''>";
echo    "<button type='submit' name='submit' value='inserimento'>
        <img src='images/new_f1.png' height='15'></button>
        &nbsp;Nuovo testo";
echo    "</form></fieldset><br >";

//mostro i contenuti 

$conto2=count($array_file);
for($b=0; $b<$conto2; $b++)   
    {   
    $file= $array_file[$b];      
    $dir = $a.$file;
    echo "<form method='post' action='tiny.php'>";      
    echo "<input type='label'  size='30' name='file' value='".$dir."'>";
    echo "<button type='submit' name='submit' value='modifica'><img src='images/edit_f2.png' height='15' ></button>";
    echo "<button type='submit' name='submit' value='cancella'><img src='images/cancel_f1.png' height='15' ></button>";
    echo "</form>";
    }
?>