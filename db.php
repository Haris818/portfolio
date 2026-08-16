<?php

$host = "db.fr-roub1.bengt.wasmernet.com";
$port = 20184;
$username = "user_58866cc0";
$password = "pw_ucCGVi16A7h9Ao2IwI7CXo4ErKFTpHgD";
$database = "db_c2ae770c";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database,
    $port
);

$conn->set_charset("utf8mb4");

?>
