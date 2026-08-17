<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


/*
|--------------------------------------------------------------------------
| Only POST requests
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: login.html");
    exit;

}


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN DETAILS
|--------------------------------------------------------------------------
*/

$admin_username = "admin";
$admin_password = "Admin@12345";


/*
|--------------------------------------------------------------------------
| Get Form Data
|--------------------------------------------------------------------------
*/

$username = trim(
    $_POST["username"] ?? ""
);

$password = $_POST["password"] ?? "";


/*
|--------------------------------------------------------------------------
| Check Login
|--------------------------------------------------------------------------
*/

if (
    $username === $admin_username &&
    $password === $admin_password
) {

    session_regenerate_id(true);

    $_SESSION["admin_logged_in"] = true;

    $_SESSION["admin_username"] = $username;


    /*
    |------------------------------------------
    | Login successful
    |------------------------------------------
    */

    header("Location: dashboard.php");
    exit;

}


/*
|--------------------------------------------------------------------------
| Wrong Login
|--------------------------------------------------------------------------
*/

echo "<!DOCTYPE html>";

echo "<html>";

echo "<head>";

echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";

echo "<title>Login Failed</title>";

echo "</head>";

echo "<body style='font-family:Arial;text-align:center;padding:50px;'>";

echo "<h2>❌ Invalid Username or Password</h2>";

echo "<p>Please check your login details.</p>";

echo "<br>";

echo "<a href='login.html'>← Back to Login</a>";

echo "</body>";

echo "</html>";

exit;

?>