<?php
require_once 'funzioni/dateUtils.php';

$vid = $_POST['vid'] ?? '';
$vstat = $_POST['vstat'] ?? '';
$vnume = $_POST['vnume'] ?? '';
$vdata = parseInputDate($_POST['vdata'] ?? '');
$vimporto = number_format($_POST['vimporto'] ?? 0, 2, '.', '');
$vanno = $_POST['vanno'] ?? '';
$vprog = $_POST['vprog'] ?? '';
$vmezzo = $_POST['vmezzo'] ?? '';
$vrife = $_POST['vrife'] ?? '';
$vassnum = $_POST['vassnum'] ?? '';
?>
