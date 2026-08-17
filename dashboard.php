<?php

require_once "../db.php";

$sql = "SELECT * FROM contact_messages ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

</head>

<body>

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

    <td>
        <?= htmlspecialchars($row["id"]) ?>
    </td>

    <td>
        <?= htmlspecialchars($row["name"]) ?>
    </td>

    <td>
        <?= htmlspecialchars($row["email"]) ?>
    </td>

    <td>
        <?= htmlspecialchars($row["subject"]) ?>
    </td>

    <td>
        <?= nl2br(htmlspecialchars($row["message"])) ?>
    </td>

</tr>

<?php endwhile; ?>

</table>

</body>

</html>