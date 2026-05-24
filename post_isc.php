<?php
require_once 'funzioni/dateUtils.php';

$id = $_POST['id'] ?? '';
$stato = $_POST['stato'] ?? '';
$numero_iscrizione = $_POST['numero_iscrizione'] ?? '';
$titolo = $_POST['titolo'] ?? '';
$titolo_plus = $_POST['titolo_plus'] ?? '';
$cognome = htmlspecialchars(trim($_POST['cognome'] ?? ''), ENT_QUOTES);
$nome = htmlspecialchars($_POST['nome'] ?? '', ENT_QUOTES);
$indirizzo = htmlspecialchars($_POST['indirizzo'] ?? '', ENT_QUOTES);
$cap = $_POST['cap'] ?? '';
$localita = htmlspecialchars($_POST['localita'] ?? '', ENT_QUOTES);
$prov = $_POST['prov'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$cellulare = $_POST['cellulare'] ?? '';
$cod_fisc = strtoupper($_POST['cod_fisc'] ?? '');
$nascita_luogo = htmlspecialchars($_POST['nascita_luogo'] ?? '', ENT_QUOTES);
$nascita_provincia = $_POST['nascita_provincia'] ?? '';
$prov_na = $_POST['prov_na'] ?? '';
$nascita_nazione = $_POST['nascita_nazione'] ?? '';
$provincia = strtoupper($_POST['provincia'] ?? '');

$nascita_data = parseInputDate($_POST['nascita_data'] ?? '', 'd/m/Y', 'Y-m-d');
$data_iscrizione = parseInputDate($_POST['data_iscrizione'] ?? '', 'd/m/Y', 'Y-m-d');
$data_uscita = parseInputDate($_POST['data_uscita'] ?? '', 'd/m/Y', 'Y-m-d');

$tipologia = $_POST['tipologia'] ?? '';
$icons_ese = $_POST['icons_ese'] ?? '';
$icons_dir = $_POST['icons_dir'] ?? '';
$icons_garan = $_POST['icons_garan'] ?? '';
$stampa = $_POST['stampa'] ?? '';
$archiviare = $_POST['archiviare'] ?? '';
$email = $_POST['email'] ?? '';
$note = htmlspecialchars($_POST['note'] ?? '', ENT_QUOTES);
$volontario = $_POST['volontario'] ?? '';
?>
