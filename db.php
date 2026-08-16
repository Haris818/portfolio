<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "db.fr-roub1.bengt.wasmernet.com";
$port = 20184;
$username = "user_512b0390";
$password = "YOUR_NEW_PASSWORD";
$database = "db_5c933e78";

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

echo "Database connected successfully!";

?>
