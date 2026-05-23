<?php
$vid = $_POST['vid'] ?? '';
$vstat = $_POST['vstat'] ?? '';
$vnume = $_POST['vnume'] ?? '';
$date = date_create($_POST['vdata'] ?? '');
$vdata = $date ? date_format($date, 'd/m/Y') : '';
$vimporto = number_format($_POST['vimporto'] ?? 0, 2, '.', '');
$vanno = $_POST['vanno'] ?? '';
$vprog = $_POST['vprog'] ?? '';
$vmezzo = $_POST['vmezzo'] ?? '';
$vrife = $_POST['vrife'] ?? '';
$vassnum = $_POST['vassnum'] ?? '';
?>
