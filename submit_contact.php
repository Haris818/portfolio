<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request.");
}

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$subject = trim($_POST["subject"] ?? "");
$message = trim($_POST["message"] ?? "");

if ($name === "" || $email === "" || $message === "") {
    echo "<script>
        alert('Please fill all required fields.');
        window.history.back();
    </script>";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        alert('Please enter a valid email address.');
        window.history.back();
    </script>";
    exit;
}

$sql = "INSERT INTO contact_messages (name, email, subject, message)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssss",
    $name,
    $email,
    $subject,
    $message
);

if ($stmt->execute()) {

    echo "<script>
        alert('Message sent successfully!');
        window.location.href = 'index.php#contact';
    </script>";

} else {

    echo "<script>
        alert('Message could not be sent. Please try again.');
        window.history.back();
    </script>";
}

$stmt->close();
$conn->close();

?>