<?php
$numero = $row['ID'] ?? '';
$titolo = $row['titolo'] ?? '';
$titolo_plus = $row['titolo_plus'] ?? '';
$RagioneSociale = $row['RagioneSociale'] ?? '';
$indirizzo = stripcslashes($row['indirizzo'] ?? '');
$cap = $row['cap'] ?? '';
$localita = $row['localita'] ?? '';
$provincia = $row['provincia'] ?? '';
$telefono = $row['telefono'] ?? '';
$date = date_create($row['data_inserimento'] ?? '');
$data_inserimento = $date ? date_format($date, 'd/m/Y') : '';
$stampa = $row['stampa'] ?? '';
$note = $row['note'] ?? '';
?>
