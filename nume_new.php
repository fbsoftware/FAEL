<?php
header('Content-Type: application/json; charset=utf-8');
session_start();

include_once('classi/DB.php');
$db1 = new DB('sito');
$db1->openDB();
DB::config();

$conn = new PDO("mysql:host=".DB::$a.";dbname=".DB::$c, DB::$b, DB::$p);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tipo = $_SESSION['pag'];
$term = isset($_GET['term']) ? trim($_GET['term']) : '';

if (empty($term)) {
    echo json_encode([]);
    exit;
}

$cmd = "SELECT * FROM ".DB::$pref."isc
        WHERE numero_iscrizione >= :term AND stato = :stato
        ORDER BY numero_iscrizione ASC
        LIMIT 15";

$result = $conn->prepare($cmd);
$result->bindValue(":term", $term);
$result->bindValue(":stato", $tipo);
$result->execute();

$return_arr = array();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $return_arr[] = [
        'id' => $row['id'],
        'label' => $row['numero_iscrizione'] . " - " . $row['cognome'] . " " . $row['nome'],
        'value' => $row['numero_iscrizione'],
        'cognome' => $row['cognome'],
        'nome' => $row['nome'],
        'numero_iscrizione' => $row['numero_iscrizione']
    ];
}

echo json_encode($return_arr);
?>
