<?php
$conn = new mysqli("localhost", "root", "", "my_fael");
if ($conn->connect_error) {
    exit("Errore connessione");
}
$conn->set_charset("utf8");
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

 $sql = "
    SELECT id, numero_iscrizione , cognome , nome
    FROM tbl_isc
    WHERE id = ?
    LIMIT 1
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "window.location.href = 'upd_isc.php?pag=<?php echo $tipo; ?>&id=' + ui.item.id";
    echo "<h3>" . htmlspecialchars($row["cognome"]) . "</h3>";
    echo "<p>ID: " . htmlspecialchars($row["id"]) . "</p>";
    echo "<p>Nome: " . htmlspecialchars($row["nome"]) . "</p>";
    echo "<p>numero_iscrizione: " . htmlspecialchars($row["numero_iscrizione"]) . "</p>";
    echo "<p>: " . htmlspecialchars($row[""]) . "</p>";
} else {
    echo "Anagrafico non trovato";
}