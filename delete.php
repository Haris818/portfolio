<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN CHECK
|--------------------------------------------------------------------------
*/

if (
    !isset($_SESSION["admin_logged_in"]) ||
    $_SESSION["admin_logged_in"] !== true
) {
    header("Location: login.html");
    exit;
}


/*
|--------------------------------------------------------------------------
| DATABASE
|--------------------------------------------------------------------------
*/

require_once "db.php";


/*
|--------------------------------------------------------------------------
| GET MESSAGE ID
|--------------------------------------------------------------------------
*/

$id = filter_input(
    INPUT_GET,
    "id",
    FILTER_VALIDATE_INT
);

if (!$id || $id <= 0) {
    header("Location: dashboard.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/

$stmt = $conn->prepare(
    "DELETE FROM contact_messages WHERE id = ?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

$stmt->close();

$conn->close();


/*
|--------------------------------------------------------------------------
| BACK TO DASHBOARD
|--------------------------------------------------------------------------
*/

header("Location: dashboard.php");
exit;

?>
