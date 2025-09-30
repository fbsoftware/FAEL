<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
=============================================================================
   * 10/05/2023		tolto CCPP
=============================================================================  */
// riquadro sup-sx
$pdf->SetDrawColor(255,0,0);
$pdf->Rect(5,5+$disp,100,45);
$pdf->Image('images/logo/logo.png',10,13+$disp,23,30,'PNG');
$pdf->SetFont('arial','BI',16);
$pdf->Text(27,16+$disp,'ASSOCIAZIONE');
$pdf->SetTextColor(255,0,0);
$pdf->Text(72,16+$disp,'FAEL OdV');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','',8);
$pdf->Text(34,19+$disp,'Familiari ed Amici Emopatici contro la Leucemia');
//$pdf->Text(31,22+$disp,'Onlus - Organizzazione non lucrativa di utilità sociale');
$pdf->Text(34,33+$disp,'Via 25 Aprile 18 - 25121 Brescia - Tel./Fax 030 4194102');
$pdf->Text(34,36+$disp,'Cod. Fisc. 98031170172');
$pdf->Text(34,39+$disp,'sito internet: www.fael.net - email: sede@fael.net');
y
?>
