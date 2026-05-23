<?php
$id = $_POST['id'] ?? '';
$stato = $_POST['stato'] ?? '';
$numero = $_POST['numero'] ?? '';
$titolo = $_POST['titolo'] ?? '';
$titolo_plus = $_POST['titolo_plus'] ?? '';
$RagioneSociale = htmlspecialchars(trim($_POST['RagioneSociale'] ?? ''), ENT_QUOTES);
$referente = htmlspecialchars($_POST['referente'] ?? '', ENT_QUOTES);
$indirizzo = htmlspecialchars($_POST['indirizzo'] ?? '', ENT_QUOTES);
$cap = $_POST['cap'] ?? '';
$localita = htmlspecialchars($_POST['localita'] ?? '', ENT_QUOTES);
$provincia = $_POST['provincia'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$date = date_create($_POST['data_inserimento'] ?? '');
$data_inserimento = $date ? date_format($date, 'd/m/Y') : '';
$stampa = $_POST['stampa'] ?? '';
$note = htmlspecialchars($_POST['note'] ?? '', ENT_QUOTES);
$tipo = $_POST['tipo'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$email = $_POST['email'] ?? '';
?>
