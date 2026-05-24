<?php
require_once 'funzioni/dateUtils.php';

$numero = $row['ID'] ?? '';
$titolo = $row['titolo'] ?? '';
$titolo_plus = $row['titolo_plus'] ?? '';
$RagioneSociale = $row['RagioneSociale'] ?? '';
$indirizzo = stripcslashes($row['indirizzo'] ?? '');
$cap = $row['cap'] ?? '';
$localita = $row['localita'] ?? '';
$provincia = $row['provincia'] ?? '';
$telefono = $row['telefono'] ?? '';
$data_inserimento = parseDbDate($row['data_inserimento'] ?? '');
$stampa = $row['stampa'] ?? '';
$note = $row['note'] ?? '';
?>
