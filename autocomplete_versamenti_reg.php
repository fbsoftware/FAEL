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
    SELECT vid, vnume, vimporto, vdata, vmezzo
    FROM ".DB::$pref."ver
    WHERE (
        vnume LIKE :term1
        OR vmezzo LIKE :term2
    )
    ORDER BY vdata DESC, vnume ASC
    LIMIT 20
");

$stmt->bindValue(':term1', $like, PDO::PARAM_STR);
$stmt->bindValue(':term2', $like, PDO::PARAM_STR);
$stmt->execute();

$out = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $out[] = [
        "id" => $row["vid"],
        "label" => $row["vnume"] . " - €" . number_format($row["vimporto"], 2, ',', '.') . " (" . $row["vdata"] . ")",
        "value" => $row["vnume"],
        "vnume" => $row["vnume"],
        "vimporto" => $row["vimporto"],
        "vmezzo" => $row["vmezzo"]
    ];
}

echo json_encode($out);
?>
