<?php
$servername = "<your-rds-endpoint>";
$username = "admin";
$password = "<rds-password>";
$dbname = "<db-name>";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    header('Content-Type: application/json');
    echo json_encode($tables);
} catch (PDOException $e) {
    echo "Error fetching table names: " . $e->getMessage();
}

$conn = null;
?>
