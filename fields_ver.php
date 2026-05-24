<?php
require_once 'funzioni/dateUtils.php';

$vid = $row['vid'] ?? '';
$vstat = $row['vstat'] ?? '';
$vnume = $row['vnume'] ?? '';
$vimporto = $row['vimporto'] ?? '';
$vdata = parseDbDate($row['vdata'] ?? '');
$vanno = $row['vanno'] ?? '';
$vprog = $row['vprog'] ?? '';
$vmezzo = $row['vmezzo'] ?? '';
$vrife = $row['vrife'] ?? '';
$vassnum = $row['vassnum'] ?? '';
?>
