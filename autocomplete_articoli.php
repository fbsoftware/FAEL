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
    SELECT aid, aprog, atit, aalias
    FROM ".DB::$pref."art
    WHERE (
        atit LIKE :term1
        OR aalias LIKE :term2
        OR aprog LIKE :term3
    )
    ORDER BY atit ASC
    LIMIT 20
");

$stmt->bindValue(':term1', $like, PDO::PARAM_STR);
$stmt->bindValue(':term2', $like, PDO::PARAM_STR);
$stmt->bindValue(':term3', $like, PDO::PARAM_STR);
$stmt->execute();

$out = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $out[] = [
        "id" => $row["aid"],
        "label" => $row["atit"] . " (" . $row["aprog"] . ")",
        "value" => $row["atit"],
        "aprog" => $row["aprog"],
        "aalias" => $row["aalias"]
    ];
}

echo json_encode($out);
?>
