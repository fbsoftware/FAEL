<?php
echo "Partenza backup";
// Credenziali di accesso FTP remoto
$ftp_server = 'ftp.fael.altervista.org'; // Server FTP esterno
$ftp_username = 'fael'; // Username Server FTP esterno
$ftp_password = 'faubre'; // Password FTP server esterno

// Cartella del sito da backuppare
$sito_dir = '/var/www/html';

// Percorso completo dell'archivio compresso del sito
$sito_filename = '/var/www/html/backup/backup_sito.tar'; 

// Database
$db_nome = 'my_fael';
$db_user = 'fael';
$db_pass = 'faubre';
$db_host = 'localhost';

// Percorso completo del backup SQL
echo $db_filename = '/var/www/html/backup/backup_database.sql';

// comprimo i file del sito
$copia_sito = exec('tar -cvf ' . $sito_filename . ' ' . $sito_dir);

// creo il backup del DB
// assicuratevi che il percorso di mysqldup sia corretto
$copia_db = exec('/usr/bin/mysqldump -opt -user=' . $db_user . ' -password=' . $db_pass . ' --host=' . $db_host . ' ' . $db_nome . ' > ' . $db_filename);

// verifico che la creazione in locale dei backup abbia funzionato
if ($copia_sito && $copia_db) {
  
  // mi connetto al FTP
  $cn = ftp_connect($ftp_server);
  
  // eseguo il login al FTP
  $login_result = ftp_login($cn, $ftp_username, $ftp_password);
  
  // se la connessione ed il login sono riusciti...
  if ($cn && $login_result) {
    
    // ...effettuo l'upload dell'archivio compresso
	echo "Sito compresso";
    $upload_sito = ftp_put($cn,'backup_sito_'.date("Ymd").'.tar',$sito_filename,FTP_BINARY);

    // ...ed anche quello del DB
	echo "Database compresso";
    $upload_db = ftp_put($cn,'backup_database_'.date("Ymd").'.sql',$db_filename,FTP_BINARY);
    
  }
  
  // chiudo la connessione
  ftp_close($cn);
  
  // cancello i backup in locale
  unlink($sito_filename);
  unlink($db_filename);
}
?>