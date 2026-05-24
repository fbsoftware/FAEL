<?php
require_once 'funzioni/dateUtils.php';

$eid = $row['eid'] ?? '';
$estat = $row['estat'] ?? '';
$enume = $row['enume'] ?? '';
$eimporto = $row['eimporto'] ?? '';
$edata = parseDbDate($row['edata'] ?? '');
$enota = stripcslashes($row['enota'] ?? '');
$eprog = $row['eprog'] ?? '';
$emezzo = $row['emezzo'] ?? '';
$erife = $row['erife'] ?? '';
$eassnum = $row['eassnum'] ?? '';
$evento = $row['evento'] ?? '';
$ecausale = $row['ecausale'] ?? '';
$eanno = $row['eanno'] ?? '';
?>
