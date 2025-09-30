<?php  session_start();   ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------
   * Controllo password inserita
============================================================================= */
/*require_once 'init_sito.php';*/
//include_once 'include_gest.php';
$username  =$_POST['uten'];
$upassword =$_POST['pass'];
$passmd5   =md5($upassword);    // cripto la password
/*//include_once 'classi/DB.php';
$dbase = new DB('sito'); $dbase->openDB();
echo $sql = "SELECT * FROM `".DB::$pref."ute`
        WHERE username='".$username."' and ustat<>'A'";

$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
  {echo "arrivato qui";
    	if ( $row['upassword'] == $passmd5)
            {
            if ( $row['uiscritto'] > 0)
               {}
            setcookie('admin',$username,time()+3600,'','','');
            setcookie('accesso',$row['uaccesso'],time()+3600,'','','');
            setcookie('numero',$row['uiscritto'],time()+3600,'','','');
            setcookie('err','0',time()+3600,'','','');
            header('location:index.php?forma=Iscritti&sub=&content=htm&dati=widget.php&pag=') ;
            }
       else
           {
           setcookie('err','1',time()+3600,'','','');
           header('location:login.php') ;
           }

    }	*/	            setcookie('admin',$username,time()+3600,'','','');            setcookie('accesso','9',time()+3600,'','','');            //setcookie('numero',$row['uiscritto'],time()+3600,'','','');            setcookie('err','0',time()+3600,'','','');            header('location:index.php?forma=Iscritti&sub=&content=htm&dati=widget.php&pag=') ;
ob_end_flush();
?>
