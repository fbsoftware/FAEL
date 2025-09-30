<?php session_start(); 
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.1    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */   
ob_start();
$content = $_POST['content'];
$file    = $_POST['file']; 
if  ( $content > "    ")
{
file_put_contents($file,$content);
ob_flush();
}
header('location:read_dir.php')
?>
