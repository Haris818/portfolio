<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "PHP STARTED<br>";

require_once "../db.php";

echo "DB FILE LOADED<br>";

if (!isset($conn)) {
    die("ERROR: \$conn is not defined in db.php");
}

if ($conn->connect_error) {
    die("DATABASE ERROR: " . $conn->connect_error);
}

echo "DATABASE CONNECTED<br>";

$sql = "SELECT * FROM contact_messages ORDER BY id DESC";

$result = $conn->query($sql);

if (!$result) {
    die("SQL ERROR: " . $conn->error);
}

echo "TABLE QUERY SUCCESSFUL<br>";

?>

<h1>Contact Messages</h1>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Subject</th>
    <th>Message</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>

<tr>

    <td><?= htmlspecialchars($row["id"]) ?></td>

    <td><?= htmlspecialchars($row["name"]) ?></td>

    <td><?= htmlspecialchars($row["email"]) ?></td>

    <td><?= htmlspecialchars($row["subject"]) ?></td>

    <td><?= nl2br(htmlspecialchars($row["message"])) ?></td>

</tr>

<?php endwhile; ?>

</table>
