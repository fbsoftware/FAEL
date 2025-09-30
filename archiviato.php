<?php
define('EURO', chr(128));

               // stampa indirizzo dell'iscritto
              $dc  = new DB_decod2('xdb','xstat','xtipo','xcod','tit',$titolo,'xdes');
               $tit1 = $dc->decod2();
               $dc  = new DB_decod2('xdb','xstat','xtipo','xcod','tit+',$titolo_plus,'xdes');
               $tit2 = $dc->decod2();  
               // cerca il versamento anno iscrizione
               $sqlv = "SELECT * FROM `".DB::$pref."isc`
                        WHERE vnume = $numero_iscrizione and vanno = $anno
                        LIMIT 1";
               $modv = mysql_query($sqlv);
               $row = mysql_fetch_array($modv);
               include 'fields_ver.php';
               //$pdf->Text(140,70,"Brescia: ".date('d-m-Y'));    02/03/2023
			   $timestamp = strtotime($data_uscita);
				// Creating new date format from that timestamp
				$datau = date("d-m-Y", $timestamp);
			   $pdf->Text(140,70,"Brescia: ".$datau);			//02/03/2023

               $pdf->Text(35,101,$cognome."  ".$nome);
               $pdf->Text(35,107,$indirizzo);
               $pdf->Text(35,113,$cap." - ".strtoupper($localita)."  ".$prov);
               $pdf->Text(85,120,"E' stato archiviato il socio ".$numero_iscrizione." perche':");
			   $pdf->Text(85,126,$note);
?>/