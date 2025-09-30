<?php session_start();      ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
=============================================================================
	25.03.21	creazione file.csv da anagrafico
=============================================================================*/
require_once('init_admin.php');
//print_r($_POST);//debug
$azione  =$_POST['submit'];
//  chiude
switch ($azione)
{
    case 'chiudi' :
		 $loc = "location:admin.php?urla=widget.php&pag=";
			header($loc);
    break;

    case 'esporta' :
// transazione
     $sql = "SELECT  `acod`,`atit`, `ades`, `aprez`,`aimg`,`acat`
				FROM `".DB::$pref."art`
			 WHERE `astat`=' '  ORDER BY `aprog`";
// testata
$data=array();
$data = "COD;Nome;Descrizione;Prezzo di listino;Immagine;Categorie;\n";
foreach($PDO->query($sql) as $row)
     {	// decodifica categoria
		 $categoria="";
		 $sql_cat="SELECT *
                    FROM ".DB::$pref."cat
                    WHERE cstat !='A'
					AND ccod = ".$row['acat']."
                    LIMIT 1";
          foreach($PDO->query($sql_cat) as $row_cat)
            {
              $categoria=$row_cat['cwoo'];
            }
$data .= " ".$row['acod'].";".$row['atit'].";".$row['ades'].";".$row['aprez'].";".ltrim($row['aimg']).";".$categoria."\n";
	 }

// scrive il file
$fp = fopen('../CSV/file_per_woo.csv', 'w');
fwrite($fp, print_r($data, true));
          $_SESSION['esito'] = 62;
		$loc = "location:admin.php?".$_SESSION['location']."";
		header($loc);
    break;

default:
     echo "Operazione invalida=".$azione;
}
ob_end_flush();

?>
