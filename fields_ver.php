<?php
$vid = $row['vid'] ?? '';
$vstat = $row['vstat'] ?? '';
$vnume = $row['vnume'] ?? '';
$vimporto = $row['vimporto'] ?? '';
$date = date_create($row['vdata'] ?? '');
$vdata = $date ? date_format($date, 'd/m/Y') : '';
$vanno = $row['vanno'] ?? '';
$vprog = $row['vprog'] ?? '';
$vmezzo = $row['vmezzo'] ?? '';
$vrife = $row['vrife'] ?? '';
$vassnum = $row['vassnum'] ?? '';
?>
