<?php
$eid = $_POST['eid'] ?? '';
$estat = $_POST['estat'] ?? '';
$enume = $_POST['enume'] ?? '';
$date = date_create($_POST['edata'] ?? '');
$edata = $date ? date_format($date, 'd/m/Y') : '';
$eimporto = number_format($_POST['eimporto'] ?? 0, 2, '.', '');
$eprog = $_POST['eprog'] ?? '';
$emezzo = $_POST['emezzo'] ?? '';
$erife = $_POST['erife'] ?? '';
$eassnum = $_POST['eassnum'] ?? '';
$evento = $_POST['evento'] ?? '';
$ecausale = $_POST['ecausale'] ?? '';
$eanno = $_POST['eanno'] ?? '';
$enota = $_POST['enota'] ?? '';
?>