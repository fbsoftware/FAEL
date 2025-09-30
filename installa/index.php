<?php
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.4
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
==============================================================================*/
require_once('../loadLibraries.php');
$app = new Head('Installazione');
$app->openHead();
require_once("../jquery_linkAdmin.php");
require_once("../include_head.php");
$app->closeHead();
?>

</head>

<body>
<?php
// definizione variabili
$host="localhost";
$user="root";
$pw="";
$db="woo_commerce";
$pref="woo_";
$sep="/";
$e_mail="tua-mail@xxxxxx.it";
$page_title="Installazione";
$site="Libreria standard FB";
$dir_imm="images/";
$author="fbsoftware";
$keywords="";
$root="/WOO/";
$lib="libFB_2_0_0";
$url="http://fbsoftware.xxxxxxxxx.org";
$incr=5;

// testata
echo "<div>
<form action='database.php' method='post'>
     <fieldset >
     <h3>Creazione del database con le tabelle del sito</h3>";
echo "</fieldset>";
echo "</div>";


// dati del database
echo "<div  class='f-flex fd-row jc-center'>";
echo "<div class='f-dim1'>
     <fieldset><legend>Dati del database</legend> ";
	$f1 = new field($host,'host',20,'Host');
		$f1->field_i();
	$f2 = new field($user,'user',20,'Utente');
		$f2->field_i();
	$f3 = new field($pw,'pw',20,'Password');
		$f3->field_pw();
	$f4 = new field($db,'db',20,'Database');
		$f4->field_i();
	$f5 = new field($pref,'pref',20,'Prefisso');
		$f5->field_i();
echo "</fieldset>";
echo "</div>";


// dati di configurazione
echo "<div class='f-dim1'>
 	 <fieldset><legend>Dati di configurazione</legend>";
	$f6 = new field($site,'site',20,'Nome del sito');
		$f6->field_i();
	$f7 = new field($page_title,'page_title',20,'Titolo home page');
		$f7->field_i();
	$f8 = new field($root,'root',20,'Root sito');
		$f8->field_i();
	$f9 = new field($dir_imm,'dir_imm',20,'Path immagini');
		$f9->field_i();
	$f0 = new field($author,'author',20,'Autore');
		$f0->field_i();
	$fa = new field($keywords,'keywords',40,'Keywords');
		$fa->field_i();
	$fc = new field($sep,'sep',20,'Separatore path');
		$fc->field_i();
	$fd = new field($incr,'incr',20,'Incremento DB');
		$fd->field_i();
	$fe = new field($e_mail,'e_mail',20,'E-mail del sito');
		$fe->field_i();
	$fb = new field($lib,'lib',20,'Libreria classi');
		$fb->field_i();
	$ff = new field($url,'url',20,'Sito dell\'autore');
		$ff->field_i();
echo "</fieldset>";
echo "</div>";
echo "</div>";

//  avvio creazione
echo "<div>";
echo "<fieldset>
     <label for='subm-crea'>Avvia la creazione</label>
          <button  class='fb-accent fb-p05 fb-rad7 fb-m05' type='submit' id='subm-crea' value='OK' >OK</button>";
echo "</fieldset>";
echo "</form>";
echo "</div>";
?>
</body>
</html>
