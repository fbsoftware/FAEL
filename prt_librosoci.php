<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * 07/09/2022	Stampa libro soci nuovi/dismessi per anno
=============================================================================  */
include_once('classi/DB.php');
include_once('classi/data.php');
$db1      = new DB('sito');  
$db1->openDB(); 
print_r($_POST);//debug
echo $azione   = $_POST['submit'];
echo $soci     = $_POST['soci'];
echo $anno     = $_POST['anno'];
 if ($soci == 'new')
{
	$title = "NUOVI SOCI ANNO ".$anno;
}
elseif ($soci == 'arc')
{ 	
echo $title = "SOCI DISMESSI ANNO ".$anno;
}
echo $data1 = $anno.'-01-01';
echo $data2 = $anno.'-12-31';
//goto fine;

$n = 0;
// uscita
    switch ($azione)
     {
     case 'ritorno': 
          {  
          $loc = "location:index.php?urla=widget.php&pag=";
          header($loc);
          break;   }  
     } 
             
define('FPDF_FONTPATH','font/');
require('fpdf.php');

//===   GESTIONE PDF   =======================================================================
class PDF extends FPDF
{
function Header()
{ 	global $title;  
    $this->SetFont('Arial','B',8);   
    $this->SetTextColor(0,0,0);             //  and text      
    $this->SetX(10);     
	$this->SetY(15);                            //  and position
// titolo 
	//==========================
    $this->Cell(50,5,$title);
	//==========================
    $this->Ln(5);
// intestazione colonne 
    $this->SetTextColor(0,0,0);             //  and text      
    $this->SetX(5);
    //$this->Cell(10,5,'');
    $this->Cell(50,5,'Num. Cognome e Nome');       
    $this->Cell(50,5,' Residenza');
    $this->Cell(21,5,'Telefono');
	$this->Cell(30,5,'Codice Fiscale');
    $this->Cell(35,5,'Luogo e data di nascita'); 
    $this->Cell(20,5,'Carica');
	$this->Cell(20,5,'Iscrizione');
	$this->Cell(20,5,'Uscita');
	$this->Cell(20,5,'Motivo');
    $this->Cell(10,5,'Progr');                             
    $this->Ln(5);
//riga               
    $this->SetX(0);
    $this->Cell(280,.3,'',1,1,'C',1);           
    $this->Ln(3);    
     }                        
function Footer()
    { 
    }  

}
//=============================================================================================

$pdf=new PDF('L','mm');
$pdf->Open();
$pdf->SetTextColor(0,0,0); 
$pdf->AddPage();   
$pdf->SetFont('arial','',6); 
$pdf->SetAutoPageBreak(true,15);

 if ($soci == 'new')
{
           $sql="SELECT * FROM `".DB::$pref."isc` 
                 WHERE stato = 'I' 
                 and data_iscrizione <= '".$data2."'
				 and data_iscrizione >= '".$data1."'
                 ORDER BY numero_iscrizione";
}
else
{
           $sql="SELECT * FROM `".DB::$pref."isc` 
                 WHERE stato = 'A' 
                 and data_uscita <= '".$data2."'
				 and data_uscita >= '".$data1."'
                 ORDER BY numero_iscrizione";	
}
// lettura dati
                 
           $res2 = mysql_query($sql);
           if (!$res2) die('prt_isc:'.mysql_error());
          while($row = mysql_fetch_array($res2))  
            { 
                include('fields_isc.php'); 
               $pdf->SetX(5);                  
               $pdf->Cell(5,4.5,$numero_iscrizione);
               $nc = $cognome." ".$nome;               
               $pdf->Cell(45,4.5,substr($nc,0,35)); 
$res = "";			   
if ($cap <= 0) 
{
				$res = $indirizzo."       ".$localita." ".$prov." ";
			   $pdf->Cell(55,4.5,substr($res,0,55));
}
else
{
			   $res = $indirizzo."-".strval($cap)." ".$localita."(".$prov.")";
			   $pdf->Cell(55,4.5,substr($res,0,55));
}
if (($telefono > 0) && ($cellulare > 0))
{ $pdf->Cell(21,4.5,$cellulare);}
elseif ($telefono > 0) {$pdf->Cell(21,4.5,$telefono);} 
elseif ($cellulare > 0) {$pdf->Cell(21,4.5,$cellulare);} 	
elseif (($telefono <= 0) && ($cellulare <= 0))
{ $pdf->Cell(21,4.5,'                     ');}
$pdf->Cell(30,4.5,strtoupper($cod_fisc));

// dati di nascita
if ($nscita_prov > ' ')	$pvn = "(".$nscita_prov.")";
else $pvn = ' ';
if ($nascita_data <= '00-00-0000')    $nascita = ' ';
else
$nascita = $nascita_luogo.$pvn." il ".$nascita_data;
$pdf->Cell(35,4.5,$nascita);

// carica   
                if ($icons_dir == 0 )  $tip='Socio';  
                elseif ($icons_dir == 1 )  $tip='Consigliere';
                elseif ($icons_dir == 3 )  $tip='Segretario';                                                                     	
                elseif ($icons_dir == 4 )  $tip='Tesoriere';                                                                        
                elseif ($icons_dir == 7 )  $tip='Vice presidente';
				elseif ($icons_dir == 8 )  $tip='Presidente'; 				
$pdf->Cell(20,4.5,$tip);

// data iscrizione
$pdf->Cell(20,4.5,$data_iscrizione);

// data uscita e motivo, se data uscita
if ($data_uscita > '0000-01-01')
{
$pdf->Cell(20,4.5,$data_uscita);
$pdf->Cell(21,4.5,$note);	
}
else 
{
$pdf->Cell(20,4.5," ");	
$pdf->Cell(21,4.5," ");	
}


// totale soci				
$n++;
$pdf->Cell(5,4.5,$n);				
               $pdf->Ln(4);
}


$pdf->Output();
//fine:  echo "la fine"; 
?>
