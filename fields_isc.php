<?php
require_once 'funzioni/dateUtils.php';

$id = $row['id'] ?? '';
$stato = $row['stato'] ?? '';
$numero_iscrizione = $row['numero_iscrizione'] ?? '';
$titolo = $row['titolo'] ?? '';
$titolo_plus = $row['titolo_plus'] ?? '';
$cognome = htmlspecialchars($row['cognome'] ?? '', ENT_QUOTES);
$nome = htmlspecialchars($row['nome'] ?? '', ENT_QUOTES);
$indirizzo = htmlspecialchars($row['indirizzo'] ?? '', ENT_QUOTES);
$cap = $row['cap'] ?? '';
$localita = htmlspecialchars($row['localita'] ?? '', ENT_QUOTES);
$prov = $row['prov'] ?? '';
$telefono = $row['telefono'] ?? '';
$cellulare = $row['cellulare'] ?? '';
$cod_fisc = $row['cod_fisc'] ?? '';
$nascita_luogo = htmlspecialchars($row['nascita_luogo'] ?? '', ENT_QUOTES);
$prov_na = $row['prov_na'] ?? '';
$nascita_nazione = $row['nascita_nazione'] ?? '';
$nascita_data = parseDbDate($row['nascita_data'] ?? '');
$data_iscrizione = parseDbDate($row['data_iscrizione'] ?? '');
$data_uscita = parseDbDate($row['data_uscita'] ?? '');
$tipologia = $row['tipologia'] ?? '';
$icons_ese = $row['icons_ese'] ?? '';
$icons_dir = $row['icons_dir'] ?? '';
$icons_garan = $row['icons_garan'] ?? '';
$stampa = $row['stampa'] ?? '';
$archiviare = $row['archiviare'] ?? '';
$email = $row['email'] ?? '';
$note = htmlspecialchars($row['note'] ?? '', ENT_QUOTES);
$volontario = $row['volontario'] ?? '';
?>
