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
    SELECT eid, enume, eimporto, edata, emezzo
    FROM ".DB::$pref."vel
    WHERE (
        enume LIKE :term1
        OR emezzo LIKE :term2
    )
    ORDER BY edata DESC, enume ASC
    LIMIT 20
");

$stmt->bindValue(':term1', $like, PDO::PARAM_STR);
$stmt->bindValue(':term2', $like, PDO::PARAM_STR);
$stmt->execute();

$out = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $out[] = [
        "id" => $row["eid"],
        "label" => $row["enume"] . " - €" . number_format($row["eimporto"], 2, ',', '.') . " (" . $row["edata"] . ")",
        "value" => $row["enume"],
        "enume" => $row["enume"],
        "eimporto" => $row["eimporto"],
        "emezzo" => $row["emezzo"]
    ];
}

echo json_encode($out);
?>
