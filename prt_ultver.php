<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
=============================================================================
   * Stampa VERSAMENTI ISCRITTI - ultima annualità
=============================================================================  */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead();
     echo "</head>";

$azione    =$_POST['submit'];
$anno    =$_POST['anno'];

if ($azione == 'ritorno') {
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);  }


//===   GESTIONE PDF   =======================================================================
define('FPDF_FONTPATH','font/');
require('fpdf.php');

class PDF extends FPDF
{

function Header()
{   global $title;
    $this->SetFont('courier','B',15);
    $w=210;
    $this->SetDrawColor(80,80,80);
    $this->SetFillColor(136,136,136);
    $this->SetTextColor(255,255,255);
    $this->SetLineWidth(.1);
    $this->SetX(20);
    $this->Cell(($w-28),9,$title,1,1,'C',1);
    $this->Image('images/logo/logo.png',2,3,15,18) ;
    $this->Ln(3);
// intestazione colonne
    $this->SetTextColor(0,0,0);
    $this->SetFont('courier','B',10);
	$this->Cell(17,5,'Anno');
    $this->Cell(55,5,'N.ro Cognome e Nome');
    $this->Cell(55,5,'email');
	$this->Cell(25,5,'telefono');
	$this->Cell(25,5,'cellulare');
    
    $this->Ln(5);
//riga
    $this->Cell($w,.5,'',1,1,'C',1);
    $this->Ln(5);

    }
function Footer()
{   $this->SetY(-15);
    $this->SetFont('courier','I',8);
    $this->SetDrawColor(80,80,80);
    $this->SetFillColor(136,136,136);
    $this->SetTextColor(255,255,255);
    $this->SetLineWidth(.1);
    $this->now = date ('d/m/Y');
    $this->Cell($w,5,'Stampato in data: '.$this->now.'     Pagina '.$this->PageNo(),1,1,'R',1);  //Page number
    $this->Ln(3);
    }
}
//=============================================================================================

$pdf=new PDF('P','mm');
$pdf->Open();
$title= DB::$page_title." - ULTIMO ANNO DI VERSAMENTO FINO AL ".$_POST['anno']." ";
$pdf->AddPage();
$tot = 0.00;
$pdf->SetFont('arial','',8);
// anagrafica    
          $sql="SELECT numero_iscrizione,cognome,nome,email,telefono,cellulare FROM `".DB::$pref."isc` 
                WHERE stato = 'I' ";
				// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)          
     {
// lettura versamenti 			
  $sqlv = "SELECT DISTINCT `vanno` 
        FROM `tbl_ver`
        WHERE `vstat` = '' AND vnume = ".$row['numero_iscrizione']." 
        ORDER BY `vanno` DESC limit 1";

// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sqlv) as $row2)
	 {
 
                 include('fields_ver.php');
				 if ($row2['vanno'] <= $anno)
				 {
                 $pdf->Cell(10,5,$row2['vanno']);
                 $pdf->Cell(60,5,$row['numero_iscrizione']." - ".trim($row['cognome'])." ".trim($row['nome']));
                 $pdf->Cell(60,5,$row['email']);
                 $pdf->Cell(25,5,$row['telefono']);
                 $pdf->Cell(25,5,$row['cellulare']);
                 $pdf->Ln(5);
				 }
       }
	 }
                  

$pdf->Output();
?>
