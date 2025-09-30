<?php
/*require_once('loadLibraries.php');
require_once('loadTemplateSito.php');
require_once('lingua.php');
require_once('connectDB.php');*/
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>"; 

$azione   =$_POST['submit'];    //print_r($_POST);//debug
$id       =$_POST['id']; 
//print_r($_POST);//debug
						
     define ('FPDF_FONTPATH','font/');
     require 'fpdf.php' ;
      
// settaggi per stampa tessera nuovo socio
$pdf = new FPDF('L','mm',array(120,80));
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(30,80);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','',12);
$pdf->SetX(30);
$pdf->SetY(80);

// intestazione
$pdf->SetDrawColor(255,0,0);
$pdf->Rect(5,5+$disp,87,56);
$pdf->Image('images/logo/logo.png',5,10+$disp,28,33,'PNG');
$pdf->SetFont('arial','B',14);
$pdf->Text(32,16+$disp,'ASSOCIAZIONE');
$pdf->SetTextColor(255,0,0);
$pdf->Text(72,16+$disp,'FAEL');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','',6);
$pdf->Text(34,19+$disp,'Familiari ed Amici Emopatici contro la Leucemia');
$pdf->Text(34,22+$disp,'Via 25 Aprile 18 - 25121 Brescia - Tel./Fax 030 4194102');
$pdf->Text(34,25+$disp,'Cod. Fisc. 98031170172');
$pdf->Text(34,28+$disp,'sito internet: www.fael.net - email: sede@fael.net');
            
// dati dell'intestatario del badge
			$pdf->SetFont('arial','B',16);
			$pdf->Text(35,39,$_POST['titolo']);
			$pdf->Text(35,45,$_POST['nome']);
			$pdf->Text(35,55,$_POST['tipo']);
			$pdf->SetTextColor(255,0,0);
			$pdf->Text(70,55,'  FAEL');

$pdf->Output();
?>