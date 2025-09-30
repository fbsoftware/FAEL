<?php
//ini_set('zlib.output_compression', '0');
error_reporting(E_ALL);
ini_set('display_errors',1);
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();