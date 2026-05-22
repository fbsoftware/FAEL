<?php
header('Content-Type: application/json; charset=utf-8');

$conn = new mysqli("localhost", "root", "", "my_fael");

if ($conn->connect_error) {
    echo json_encode([
        "error" => "Connessione fallita: " . $conn->connect_error
    ]);
    exit;
}

$conn->set_charset("utf8");

$term = isset($_GET["term"]) ? trim($_GET["term"]) : "";

if ($term === "") {
    echo json_encode([]);
    exit;
}

$sql = "
    SELECT id, numero_iscrizione, cognome, nome, stato
    FROM tbl_isc
    WHERE stato = 'I'
      AND (
            cognome LIKE ?
            OR numero_iscrizione LIKE ?
          )
    ORDER BY cognome, nome ASC
    LIMIT 20
";

$like =  $term . "%";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode([
        "error" => "Errore prepare: " . $conn->error
    ]);
    exit;
}

$stmt->bind_param("ss", $like, $like);
$stmt->execute();

$result = $stmt->get_result();

$out = [];

while ($row = $result->fetch_assoc()) {
    $out[] = [
        "id" => $row["id"],
        "label" => $row["cognome"] . " - Cod. " . $row["numero_iscrizione"],
        "value" => $row["cognome"],
        "nome" => $row["nome"]
    ];
}

echo json_encode($out);