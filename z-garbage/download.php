<?php
$ftp_server="localhost"; //esempio indirizzo ip del sever
$ftp_username="fbsoftware";
$ftp_password="faubre";
// stabilisco la connessione al server ftp
$ftp_connessione = ftp_connect($ftp_server); 

// effetto login sul server
$login = ftp_login($ftp_connessione, $ftp_username, $ftp_password); 

// controllo se la connessione ha avuto buon fine
if(!$ftp_connessione || !$login){ 
        echo "Connessione fallita!";
} else {
	// per effettuare un DOWNLOAD:
	$file_da_scaricare = "folder_ftp/nomefile.ext";
	$dove_scaricare = "folder_locale/nomefile.ext";
	
	$download = ftp_get($ftp_connessione, $dove_scaricare, $file_da_scaricare, FTP_BINARY);
	
	// controllo se download andato a buon fine
	if (!$download) { 
		echo "Si è verificato un errore durante il download!<br>";
	} else {
		echo "Download avvenuto con successo<br>";
	}
	
	// chiudo connessione FTP 
	ftp_quit($ftp_connessione); 
}
?>
