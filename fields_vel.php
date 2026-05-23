<?php
$eid = $row['eid'] ?? '';
$estat = $row['estat'] ?? '';
$enume = $row['enume'] ?? '';
$eimporto = $row['eimporto'] ?? '';
$date = date_create($row['edata'] ?? '');
$edata = $date ? date_format($date, 'd/m/Y') : '';
$enota = stripcslashes($row['enota'] ?? '');
$eprog = $row['eprog'] ?? '';
$emezzo = $row['emezzo'] ?? '';
$erife = $row['erife'] ?? '';
$eassnum = $row['eassnum'] ?? '';
$evento = $row['evento'] ?? '';
$ecausale = $row['ecausale'] ?? '';
$eanno = $row['eanno'] ?? '';
?>
