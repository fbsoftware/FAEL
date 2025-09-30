<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright® 2022 - 2023 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
======================================================================================  
      19/01/2023	a)-Numerazione unica per 'ver' e 'vel' tramite tabella:bolle-anno. 
======================================================================================  */
// riquadro sup-dx
$pdf->SetFont('arial','',10);
$pdf->Rect(110,5+$disp,95,45);
$pdf->Text(120,15+$disp,'Brescia    '.$vdata);
$pdf->Text(120,38+$disp,'Ricevuta  Nr. ');
$pdf->SetFont('arial','B',14);
$pdf->Text(120,38+$disp,'                    '.$vprog);  // a
$pdf->SetFont('arial','',10);
?>