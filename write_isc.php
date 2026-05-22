<?php session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * aggiornamento tabella 'isc' 
   * 23-02-2022	- aggiunto flag_volontario si=1,no=0
   
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 
  
include('post_isc.php'); 
$azione  =$_POST['submit'];
//print_r($_POST);//debug

switch ($azione)
{
case 'esci':
{
    $_SESSION['esito'] = 2;
    error_log("DEVO USCIRE");
    header("Location: index.php?urla=widget.php&pag=");
    break;
}
          
case 'ritorno':  
          $_SESSION['esito'] = 2;
          break;

case 'nuovo':  
case 'a-iscritti':
$stato=$_SESSION['pag']; 
          $sql = "INSERT INTO `".DB::$pref."isc` 
                         (id,numero_iscrizione,titolo,titolo_plus,cognome,
                         nome,indirizzo,cap,localita,telefono,
                         cellulare,cod_fisc,nascita_luogo,
                         nascita_nazione,nascita_data,data_iscrizione,
                         tipologia,stampa,archiviare,prov,prov_na,email,  
                         stato,note,icons_dir,icons_ese,volontario,data_uscita)
                    VALUES (NULL,'$numero_iscrizione','$titolo','$titolo_plus','$cognome',
                         '$nome','$indirizzo','$cap','$localita','$telefono',
                         '$cellulare','$cod_fisc','$nascita_luogo',
                         '$nascita_nazione','$nascita_data','$data_iscrizione',
                         '$tipologia','$stampa','$archiviare','$prov','$prov_na','$email',
                         'I','$note','$icons_dir','$icons_ese','$volontario','$data_uscita')";
// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
          $PDO->exec($sql);    
          $PDO->commit();
          $_SESSION['esito'] = 54;
          error_log("nuovo salvini");
          break;

case 'modifica':
  $sql = "UPDATE `".DB::$pref."isc` 
                        SET   numero_iscrizione='$numero_iscrizione',titolo='$titolo',
                              titolo_plus='$titolo_plus',cognome='$cognome',
                              nome='$nome',indirizzo='$indirizzo',cap='$cap',
                              localita='$localita',
                              telefono='$telefono',cellulare='$cellulare',
                              cod_fisc='$cod_fisc',nascita_luogo='$nascita_luogo',
                              nascita_nazione='$nascita_nazione',nascita_data='$nascita_data',
                              data_iscrizione='$data_iscrizione',tipologia='$tipologia',
                              stampa='$stampa',archiviare='$archiviare',
                              prov='$prov',prov_na='$prov_na',email='$email',note='$note',
                              icons_dir='$icons_dir',icons_ese='$icons_ese' ,
							  volontario='$volontario',
							  data_uscita = '$data_uscita'
                        WHERE id= '$id' ";
// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
          $PDO->exec($sql);    
          $PDO->commit();                      
          $_SESSION['esito'] = 55;
          break;
		  
          
case 'cancella':
            $sql = "DELETE from `".DB::$pref."isc` 
                         WHERE id= '$id' ";

// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
                         $PDO->exec($sql);    
                         $PDO->commit();
                         $_SESSION['esito'] = 53;
                         break;
case 'archivia':
           $sql = "UPDATE `".DB::$pref."isc` 
                         SET stato='A', data_uscita='$data_uscita', note='$note'
                         WHERE id= '$id' ";
// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
                         $PDO->exec($sql);    
                         $PDO->commit();
                         $_SESSION['esito'] = 59;
                         
     		// stampa archiviato
               define ('FPDF_FONTPATH','font/');
			require 'fpdf.php' ;
     		include 'set_attrib.php' ;
     		include 'sup_sx.php'; 
     		include 'archiviato.php' ;
     		$pdf->Output();
                         break;
                         
case 'ripristina':
            $sql = "UPDATE `".DB::$pref."isc`
                         SET stato='I' , data_uscita='0000-00-00'
                         WHERE id= '$id' ";
// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
                         $PDO->exec($sql);    
                         $PDO->commit();
                         $_SESSION['esito'] = 60;
                         break;
default:
                         $_SESSION['esito'] = 2;
} 
          $loc = "Location:index.php?urla=widget.php&pag=";
		header($loc);
?>