<?php
// adeguamento delle date
// ---------------------------------------------
$id                 =$_POST['id']; 
$stato              =$_POST['stato'];   
$numero_iscrizione  =$_POST['numero_iscrizione'];                        
$titolo             =$_POST['titolo'];
$titolo_plus        =$_POST['titolo_plus'];          
$cognome            =addslashes(trim($_POST['cognome']));
$nome               =addslashes($_POST['nome']);     
$indirizzo          =addslashes($_POST['indirizzo']);     
$cap                =$_POST['cap']; 
$localita           =addslashes($_POST['localita']);
$provincia          =strtoupper($_POST['provincia']);
$telefono           =$_POST['telefono'];
$cellulare          =$_POST['cellulare'];
$cod_fisc           =strtoupper($_POST['cod_fisc']);
$nascita_luogo      =addslashes($_POST['nascita_luogo']);
$nascita_provincia  =$_POST['nascita_provincia'];
$nascita_nazione    =$_POST['nascita_nazione'];
//-----------------------------------------------------
$nascita_data = '';

if (!empty($_POST['nascita_data'])) {

    $date = DateTime::createFromFormat(
        'd/m/Y',
        $_POST['nascita_data']
    );

    if ($date) {
        $nascita_data = $date->format('Y-m-d');
    }
}
//-----------------------------------------------------
$data_iscrizione = '';

if (!empty($_POST['data_iscrizione'])) {

    $date = DateTime::createFromFormat(
        'd/m/Y',
        $_POST['data_iscrizione']
    );

    if ($date) {
        $data_iscrizione = $date->format('Y-m-d');
    }
}
//-----------------------------------------------------
$data_uscita = '';
if (!empty($_POST['data_uscita'])) {

    $date = DateTime::createFromFormat(
        'd/m/Y',
        $_POST['data_uscita']
    );

    if ($date) {
        $data_uscita = $date->format('Y-m-d');
    }
}
//-----------------------------------------------------
$tipologia          =$_POST['tipologia'];
$icons_ese          =$_POST['icons_ese'];
$icons_dir          =$_POST['icons_dir'];
$icons_garan        =$_POST['icons_garan'];
$stampa             =$_POST['stampa'];
$archiviare         =$_POST['archiviare'];
$prov               =$_POST['prov'];
$prov_na            =$_POST['prov_na'];
$email              =$_POST['email'];
$note               =addslashes($_POST['note']); 
//$tipoisc            =$_POST['tipoisc']; 
$volontario    		=$_POST['volontario'];
?>
