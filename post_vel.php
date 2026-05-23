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
$ecausale = $_POST['ecausale'] ?? '';
$enota = $_POST['enota'] ?? '';
$evento = $_POST['evento'] ?? '';
$eanno = $_POST['eanno'] ?? '';
?>