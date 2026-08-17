<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../db.php";

echo "<h2>Database Connected Successfully</h2>";

$sql = "SELECT * FROM contact_messages ORDER BY id DESC";

$result = $conn->query($sql);

if (!$result) {
    die("SQL ERROR: " . $conn->error);
}

echo "<p>Query Successful</p>";
echo "<p>Total Messages: " . $result->num_rows . "</p>";

?>

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
