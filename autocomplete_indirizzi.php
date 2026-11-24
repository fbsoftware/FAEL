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

if ($term === "") {
    echo json_encode([]);
    exit;
}

$like = $term . "%";

$stmt = $conn->prepare("
    SELECT id, numero, RagioneSociale, referente
    FROM ".DB::$pref."ind
    WHERE (
        RagioneSociale LIKE :term1
        OR numero LIKE :term2
    )
    ORDER BY RagioneSociale ASC
    LIMIT 20
");

$stmt->bindValue(':term1', $like, PDO::PARAM_STR);
$stmt->bindValue(':term2', $like, PDO::PARAM_STR);
$stmt->execute();

$out = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $out[] = [
        "id" => $row["id"],
        "label" => $row["RagioneSociale"] . " - " . $row["numero"],
        "value" => $row["RagioneSociale"],
        "numero" => $row["numero"],
        "referente" => $row["referente"]
    ];
}

echo json_encode($out);
?>
