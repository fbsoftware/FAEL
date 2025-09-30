<?php
require('WriteTag.php');
//define ('FPDF_FONTPATH','font/');
$pdf=new PDF_WriteTag();
$pdf->SetMargins(30,15,25);
$pdf->SetFont('arial','',12);
$pdf->AddPage();

// Stylesheet
$pdf->SetStyle("p","arial","N",12,"10,100,250",15);
$pdf->SetStyle("h1","times","N",18,"102,0,102",0);
$pdf->SetStyle("a","times","BU",9,"0,0,255");
$pdf->SetStyle("pers","times","I",0,"255,0,0");
$pdf->SetStyle("place","arial","U",0,"153,0,0");
$pdf->SetStyle("vb","times","B",0,"102,153,153");

// Title
$txt="<h1>Le petit chaperon rouge</h1>";
$pdf->SetLineWidth(0.5);
$pdf->SetFillColor(255,255,204);
$pdf->SetDrawColor(102,0,102);
$pdf->WriteTag(0,10,$txt,1,"C",1,5);

$pdf->Ln(2);

// Text
$txt=" 
<h1>Prova scrittura lettere da WORD</h1>
<div>
<div>Quesito del 06/05/2004 - Leucemia Iinfoblastica acuta Philadelphia - terapie</div>
<div>Buongiorno, sono un ragazzo di 26 anni affetto da leucemia Iinfoblastica acuta</div>
<div>philadelphia +, ho la fortuna di avere una sorella compatibile al 100 % ed a fine mese di</div>
<div>maggio faro' il trapianto di midoIIo...</div>
<div>Ora mi chiedo: e' vero che e' Ia pi&ugrave; difficile da curare? Quante possibiIita' ci sono di</div>
<div>guarire definitivamente (tenendo conto che assumo glivec senza problemi ed ho raccolto</div>
<div>le mie cellule staminali come scorta dopo aver superato abb bene 3 cicli di chemio)?</div>
<div>Potro' tornare a fare attivita' fisica?</div>
<div>Grazie</div>
<div>Anonimo</div>
<div>Risposta del 14/05/2004</div>
<div>Ci scusiamo innanzitutto per il ritardo della risposta.</div>
<div>In effetti la LLA Ph'-positiva &egrave; fra le forme Ieucemiche che hanno finora richiesto il</div>
<div>trapianto di midollo da donatore sano come unica terapia in grado di eradicare</div>
<div>definitivamente la malattia e quindi &egrave; fondamentale procedere con il programma di</div>
<div>trapianto dalla sorella gi&agrave; impostato.</div>
<div>Se non vi saranno complicanze, in particolare una malattia trapianto-contro ospite cronica</div>
<div>estesa, la qualit&agrave; di vita posttrapianto &egrave; tale da consentire sicuramente la ripresa</div>
<div>de|I'attivit&agrave; fisica.</div>
<div>L'aggiunta del Glivec alla terapia della LLA &egrave; cos&igrave; recente da non permetterne una</div>
<div>valutazione a medio-lungo termine ma i primi risultati sono molto promettenti e lasciano</div>
<div>sperare che I'integrazione Glivec-chemioterapia-trapianto porti a percentuali di guarigione</div>
<div>molto superiori a quelle finora ottenute.</div>
<div>Moltissimi auguri</div>
</div>
";

$pdf->SetLineWidth(0.1);
$pdf->SetFillColor(255,255,204);
$pdf->SetDrawColor(102,0,102);
$pdf->WriteTag(0,10,$txt,1,"J",0,7);

$pdf->Ln(2);

// Signature
$txt="<a href='http://www.pascal-morin.net'>Done by Pascal MORIN</a>";
$pdf->WriteTag(0,10,$txt,0,"R");

$pdf->Output();
?>
