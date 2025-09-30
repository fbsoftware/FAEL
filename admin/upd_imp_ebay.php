<?php   session_start();       ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3
   * copyright	Copyright (C) 2019 - 2020 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
   *-------------------------------------------------------------------------
   * 24/03/2021		acquisisce file.csv per articoli
============================================================================= */
require_once('init_admin.php');
// toolbar
     $param = array('upload','chiudi');
     $btx   = new bottoni_str_par('Upload - importa articoli','art','write_imp_ebay.php',$param);
          $btx->btn();

// Uploads files
$azione = $_POST['submit'];

switch($azione)
{
	case 'nuovo':
    // name of the uploaded file
	$filename = $_FILES['myfile']['name'];
    // destination of the file on the server
    $destination = "../CSV/articoli.csv";


    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
	$file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

	// test estensione
    if (!in_array($extension, ['csv']))
	{
	$_SESSION['esito'] = 6;
	break;
	}
	// il file NON deve superare i 3-Megabyte
	if ($_FILES['myfile']['size'] > 3000000)
	{
    $_SESSION['esito'] = 7;
	break;
	}

    // move the uploaded (temporary) file to the specified destination
    move_uploaded_file($file, $destination);
	break;

	default :
	break;




    }

?>
