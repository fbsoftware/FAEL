<?php
header('Content-Type: application/json; charset=utf-8');
session_start();

include_once 'classi/DB.php';
$db = new DB('sito');
$db->openDB();
DB::config();

$conn = new PDO("mysql:host=".DB::$a.";dbname=".DB::$c, DB::$b, DB::$p);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$term = isset($_GET["term"]) ? trim($_GET["term"]) : "";
$tipo = isset($_SESSION['pag']) ? $_SESSION['pag'] : 'I';

if ($term === "") {
    echo json_encode([]);
    exit;
}

$sql = "
    SELECT id, numero_iscrizione, cognome, nome, stato
    FROM ".DB::$pref."isc
    WHERE stato = :stato
      AND (
            cognome LIKE :term1
            OR numero_iscrizione LIKE :term2
          )
    ORDER BY cognome, nome ASC
    LIMIT 20
";

$like = $term . "%";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':stato', $tipo, PDO::PARAM_STR);
$stmt->bindValue(':term1', $like, PDO::PARAM_STR);
$stmt->bindValue(':term2', $like, PDO::PARAM_STR);
$stmt->execute();

$out = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $out[] = [
        "id" => $row["id"],
        "label" => $row["cognome"] . " " . $row["nome"] . " - " . $row["numero_iscrizione"],
        "value" => $row["cognome"],
        "nome" => $row["nome"],
        "numero_iscrizione" => $row["numero_iscrizione"]
    ];
}

echo json_encode($out);
?>