<?php session_start(); 
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.1    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */

//    $_REQUEST['iframea']="";            // RIsetta 
//    $_REQUEST['forma']  ="menu";        // tutti
//    $_REQUEST['urla']   ="";            // i
//    $_REQUEST['err']   =0;              // flag
    unset ($_COOKIE['admin']);
    header('location:index.php?iframea=&forma=menu&urla=&err=')  ;
?> 