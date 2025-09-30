<?php session_start();   ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3.4
   * copyright	Copyright (C) 2011 - 2012 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
   --------------------------------------------------------------------------
   28/04/2019	mostra il titolo con select
   27/12/2021 modifica da progressivo
============================================================================= */
?>
<style>
img.fb-imgdim {   float: left;  }
</style>

<?php
require_once('init_admin.php');
require_once('post_art.php');

// test scelta effettuata sul pgm chiamante
if ($_POST['progre'] <= 0)
{

// test scelta effettuata
//print_r($_POST);//debug
$azione = $_POST['submit'];
if (($azione == 'modifica' || $azione == 'cancella') && $aid < 1)
     {
	  $_SESSION['esito'] = 4;
      header('location:admin.php?'.$_SESSION['location'].'');
     }
}


echo "<body class='admin' data-theme='".TMP::$tcolor."'>";

// forzo l'ID e l'azione se la scelta precedente era: avanti/indietro!
if ($_REQUEST['ID'] > 0)
{
$aid = $_REQUEST['ID'];
$azione = $_REQUEST['NEW_AZ'];
}

 switch ($azione)
{
    case 'nuovo':
    {
     $param = array('nuovo','ritorno');
     $btx   = new bottoni_str_par($ARTS." - ".$INS,'art','write_art.php',$param);
          $btx->btn();

          // contenitore
     echo  "<fieldset class='f-flex fd-column'>";
      $art = new DB_ins('art','aprog');
      $f3 = new input(array($art->insert(),'aprog',3,'Progressivo','','ia'));
          $f3->field();
      $ts = new DB_tip_i('stato','astat','','Stato record','');
          $ts->select();
		$f9 = new input(array('','acod',20,'Codice','','i'));
			$f9->field();

      $f4 = new input(array('','atit',50,'Titolo','','i'));
          $f4->field();
      $f4 = new input(array('','ades',50,'Descrizione','','tx'));
          $f4->field();
		        $f4 = new input(array('','acat',50,'Categoria','','i'));
          $f4->field();
     $n  = number_format(12,2,',','');    // edit decimale
     $f5 = new input(array(0,'aprez',12,'Prezzo','','i'));
          $f5->field();
		        $f4 = new input(array('','aimg',50,'Immagine','','tx'));
          $f4->field();
		$f9 = new input(array('','aflag',1,'Flag','','i'));
			$f9->field();
echo "</fieldset>";
echo "</form>";
        break;
     }

    case 'modifica':
{   // record in modifica
$param = array('modifica','indietro','avanti','ritorno');
$btx   = new bottoni_str_par($ARTS." - ".$MOD,'art','write_art.php',$param);
     $btx->btn();

// lettura database
     if ($_POST['progre'] > 0)
     {
       $sql =  "SELECT * FROM `".DB::$pref."art`
                 WHERE `aprog` =  (select min(`aprog`)
                    FROM `".DB::$pref."art` where `aprog` >= ".$_POST['progre'].") LIMIT 1 ";
     }
     else
     {
          $sql =  "SELECT * FROM `".DB::$pref."art`
                       WHERE `aid` ='".$aid."'";
           }

     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();
     foreach($PDO->query($sql) as $row)
     {
     require_once('fields_art.php');
// flex
echo  "<div class='f-flex fd-row jc-between'>";
echo  "<div class='f-flex fd-column'>";
     //echo  "<fieldset'>";
      $f2 = new input(array($aid,'aid',03,'','','h'));
          $f2->field();
      $f3 = new input(array($aprog,'aprog',03,'Progressivo','','i'));
          $f3->field();
      $ts    = new DB_tip_i('stato','astat',$astat,'Stato record','');
          $ts->select();
		  		$f3 = new input(array($acod,'acod',20,'Codice','','i'));
			$f3->field();


      $f4 = new input(array($atit,'atit',50,'Titolo','','i'));
          $f4->field();

      $f5 = new input(array($ades,'ades',50,'Descrizione','','tx'));
        $f5->field();
		        $f6 = new input(array($acat,'acat',50,'Categoria','','i'));
              $f6->field();
          $f7 = new fieldi(number_format($aprez,2,',',''),'aprez',12,'Prezzo');
                $f7->field_i();
        $f8 = new input(array($aimg,'aimg',60,'Immagine','','tx'));
          $f8->field();
		$f9 = new input(array($aflag,'aflag',1,'Flag','','i'));
			$f9->field();
//echo  "</fieldset'>";
echo "</div>";
	 }
	 // immagini
echo "<div class='f-flex fd-column'>";
$img = explode(",",ltrim($aimg));
for ($i = 0; $i <= (count($img) - 1); ++$i)
  {
    echo "<div>";
    echo	"<a href='".ltrim($img[$i])."' target='_blank' >";
    echo	"<img src='".ltrim($img[$i])."' height=250 />";
    //$imgx = new imgdim($img[$i],275,400);
    //$imgx->maxdim();
    echo	"</a>";
    echo "</div>";
  }
echo "</div>";
echo "</div>";
break;
    }


    case 'avanti':
{   // record in modifica da lettura in avanti
$param = array('modifica','indietro','avanti','ritorno');
$btx   = new bottoni_str_par($ARTS." - ".$MOD,'art','write_art.php',$param);
     $btx->btn();

// lettura database
  $sql =  "SELECT * FROM `".DB::$pref."art`
            WHERE `aid` =  (select min(`aid`) from `".DB::$pref."art` where `aid` > ".$aid." LIMIT 1)";
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();
     foreach($PDO->query($sql) as $row)
     {
     require('fields_art.php');
// flex
echo  "<div class='f-flex fd-row jc-between'>";
echo  "<div class='f-flex fd-column'>";
     //echo  "<fieldset'>";
      $f2 = new input(array($aid,'aid',03,'','','h'));
          $f2->field();
      $f3 = new input(array($aprog,'aprog',03,'Progressivo','','i'));
          $f3->field();
      $ts    = new DB_tip_i('stato','astat',$astat,'Stato record','');
          $ts->select();
		  		$f9 = new input(array($acod,'acod',20,'Codice','','i'));
			$f9->field();

      $f4 = new input(array($atit,'atit',50,'Titolo','','i'));
          $f4->field();
      $f4 = new input(array($ades,'ades',50,'Descrizione','','tx'));
      $f4->field();
		        $f4 = new input(array($acat,'acat',50,'Categoria','','i'));
          $f4->field();
          $f4 = new fieldi(number_format($aprez,2,',',''),'aprez',12,'Prezzo');
                $f4->field_i();
		        $f4 = new input(array($aimg,'aimg',60,'Immagine','','tx'));
          $f4->field();
		$f9 = new input(array($aflag,'aflag',1,'Flag','','i'));
			$f9->field();
//echo  "</fieldset'>";
echo "</div>";
	 }
	 // immagini
echo "<div class='f-flex fd-column'>";
$img = explode(",",$aimg);
for ($i = 0; $i <= (count($img) - 1); ++$i)
{
echo "<div>";
echo	"<a href='".$img[$i]."'' target='_blank'>";
echo	"<img src='".ltrim($img[$i])."' height=250 />";
//$imgx = new imgdim($img[$i],275,400);
//$imgx->maxdim();echo	"</a>";
echo "</div>";
}
echo "</div>";
echo "</div>";
break;
    }

        case 'indietro':
    {   // record in modifica da lettura in avanti
    $param = array('modifica','indietro','avanti','ritorno');
    $btx   = new bottoni_str_par($ARTS." - ".$MOD,'art','write_art.php',$param);
         $btx->btn();

    // lettura database
      $sql =  "SELECT * FROM `".DB::$pref."art`
                WHERE `aid` =  (select max(`aid`) from `".DB::$pref."art` where `aid` < ".$aid." LIMIT 1)";
         $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
         $PDO = new PDO($con,DB::$user,DB::$pw);
         $PDO->beginTransaction();
         foreach($PDO->query($sql) as $row)
         {
         require('fields_art.php');
    // flex
    echo  "<div class='f-flex fd-row jc-between'>";
    echo  "<div class='f-flex fd-column'>";
         //echo  "<fieldset'>";
          $f2 = new input(array($aid,'aid',03,'','','h'));
              $f2->field();
          $f3 = new input(array($aprog,'aprog',03,'Progressivo','','i'));
              $f3->field();
          $ts    = new DB_tip_i('stato','astat',$astat,'Stato record','');
              $ts->select();
    		  		$f9 = new input(array($acod,'acod',20,'Codice','','i'));
    			$f9->field();

          $f4 = new input(array($atit,'atit',50,'Titolo','','i'));
              $f4->field();
          $f4 = new input(array($ades,'ades',50,'Descrizione','','tx'));
            $f4->field();
    		        $f4 = new input(array($acat,'acat',50,'Categoria','','i'));
              $f4->field();
              $f4 = new fieldi(number_format($aprez,2,',',''),'aprez',12,'Prezzo');
                    $f4->field_i();
    		        $f4 = new input(array($aimg,'aimg',60,'Immagine','','tx'));
              $f4->field();
    		$f9 = new input(array($aflag,'aflag',1,'Flag','','i'));
    			$f9->field();
    //echo  "</fieldset'>";
    echo "</div>";
    	 }
    	 // immagini
    echo "<div class='f-flex fd-column'>";
    $img = explode(",",$aimg);
    for ($i = 0; $i <= (count($img) - 1); ++$i)
    {
    echo "<div>";
    echo	"<a href='".$img[$i]."'' target='_blank'>";
    echo	"<img src='".ltrim($img[$i])."' height=250 />";
    //$imgx = new imgdim($img[$i],275,400);
    //$imgx->maxdim();    echo	"</a>";
    echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    break;
        }

    case 'cancella' :
    {
     $param = array('cancella','ritorno');
     $btx   = new bottoni_str_par($ARTS." - ".$DELCONF,'art','write_art.php',$param);
          $btx->btn();
     $sql = "SELECT *
               FROM `".DB::$pref."art`
               WHERE `aid` = $aid ";
// transazione
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();
     foreach($PDO->query($sql) as $row)
     {
     require_once('fields_art.php');
     echo  "<fieldset class='f-flex fd-column'>";
      $f2 = new input(array($aid,'aid',03,'','','h'));
          $f2->field();
      $f3 = new input(array($aprog,'aprog',03,'Progressivo','','r'));
          $f3->field();
      $f4 = new input(array($astat,'astat',01,'Stato record','','r'));
          $f4->field();
      $f5 = new input(array($acod,'acod',20,'Codice','','r'));
          $f5->field();
      $f6 = new input(array($atit,'atit',20,'Titolo','','r'));
          $f6->field();
      $f7 = new input(array($ades,'ades',30,'Descrizione','','r'));
          $f7->field();
      $f7 = new input(array($acat,'acat',20,'Categoria','','r'));
          $f7->field();
		  $f8 = new input(array($aprez,'aprez',1,'Prezzo','','r'));
          $f8->field();
      $f9 = new input(array($aimg,'aimg',30,'Immagine','','r'));
          $f9->field();
		  $f9 = new input(array($aiflag,'aflag',1,'Flag','','r'));
          $f9->field();
     }
    	 // immagini
    echo "<div class='f-flex fd-column'>";
    $img = explode(",",$aimg);
    for ($i = 0; $i <= (count($img) - 1); ++$i)
    {
    echo "<div>";
    echo	"<a href='".$img[$i]."'' target='_blank'>";
    echo	"<img src='".ltrim($img[$i])."' height=250 />";
    //$imgx = new imgdim($img[$i],275,400);
    //$imgx->maxdim();    echo	"</a>";
    echo "</div>";
    }
    echo "</div>";
echo    "</form>";
    break;
    }

case 'chiudi':
               {
               $loc = "location:admin.php";
               header($loc);
               break; }
default:
}

echo "</body>";
ob_end_flush();
?>
