<?php
/**
 * Date adjustment for print (not for display)
 * Fixes multi-byte character encoding issues
 */
require_once 'funzioni/dateUtils.php';
$id = $row['id'] ?? '';
$stato = $row['stato'] ?? '';
$numero_iscrizione = $row['numero_iscrizione'] ?? '';
$titolo = $row['titolo'] ?? '';
$titolo_plus = $row['titolo_plus'] ?? '';
$cognome = utf8_decode($row['cognome'] ?? '');
$nome = utf8_decode($row['nome'] ?? '');
$indirizzo = utf8_decode($row['indirizzo'] ?? '');
$cap = $row['cap'] ?? '';
$localita = utf8_decode(strtoupper($row['localita'] ?? ''));
$prov = $row['prov'] ?? '';
$telefono = $row['telefono'] ?? '';
$cellulare = $row['cellulare'] ?? '';
$cod_fisc = $row['cod_fisc'] ?? '';
$nascita_luogo = utf8_decode(strtoupper($row['nascita_luogo'] ?? ''));
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
$note = $row['note'] ?? '';
?>
