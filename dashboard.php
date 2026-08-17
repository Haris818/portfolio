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
    header("Location: login.php");
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
| GET CONTACT MESSAGES
|--------------------------------------------------------------------------
*/

$sql = "SELECT * FROM contact_messages ORDER BY id DESC";

$result = $conn->query($sql);

if (!$result) {
    die("Database Error: " . $conn->error);
}

$totalMessages = $result->num_rows;

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Admin Dashboard | Haris Portfolio
    </title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f5f7fb;

            color: #111827;

        }


        /* =========================
           TOP BAR
        ========================= */

        .topbar {

            background: #111827;

            color: white;

            padding: 18px 30px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .logo {

            width: 45px;

            height: 45px;

            border-radius: 12px;

            background: white;

            color: #111827;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 20px;

            font-weight: bold;

        }


        .brand h2 {

            font-size: 20px;

        }


        .brand p {

            color: #9ca3af;

            font-size: 12px;

            margin-top: 3px;

        }


        .logout {

            background: #ef4444;

            color: white;

            text-decoration: none;

            padding: 10px 16px;

            border-radius: 8px;

            font-size: 14px;

            transition: 0.2s;

        }


        .logout:hover {

            background: #dc2626;

        }


        /* =========================
           MAIN
        ========================= */

        .container {

            max-width: 1400px;

            margin: auto;

            padding: 30px;

        }


        .welcome {

            margin-bottom: 25px;

        }


        .welcome h1 {

            font-size: 30px;

            margin-bottom: 7px;

        }


        .welcome p {

            color: #6b7280;

            font-size: 15px;

        }


        /* =========================
           STATS
        ========================= */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;

            margin-bottom: 30px;

        }


        .stat-card {

            background: white;

            border-radius: 16px;

            padding: 22px;

            display: flex;

            align-items: center;

            gap: 16px;

            box-shadow:
                0 5px 20px
                rgba(0,0,0,0.05);

        }


        .stat-icon {

            width: 55px;

            height: 55px;

            border-radius: 13px;

            background: #f3f4f6;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 25px;

            flex-shrink: 0;

        }


        .stat-card span {

            display: block;

            color: #6b7280;

            font-size: 13px;

            margin-bottom: 5px;

        }


        .stat-card strong {

            font-size: 25px;

            color: #111827;

        }


        /* =========================
           MESSAGE BOX
        ========================= */

        .message-box {

            background: white;

            border-radius: 16px;

            padding: 25px;

            box-shadow:
                0 5px 20px
                rgba(0,0,0,0.05);

        }


        .message-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            margin-bottom: 22px;

        }


        .message-header h2 {

            font-size: 21px;

            margin-bottom: 5px;

        }


        .message-header p {

            color: #6b7280;

            font-size: 14px;

        }


        /* =========================
           SEARCH
        ========================= */

        .search {

            width: 260px;

            padding: 12px 14px;

            border:

                1px solid #d1d5db;

            border-radius: 9px;

            outline: none;

            font-size: 14px;

        }


        .search:focus {

            border-color: #111827;

        }


        /* =========================
           TABLE
        ========================= */

        .table-wrapper {

            width: 100%;

            overflow-x: auto;

            border-radius: 10px;

            -webkit-overflow-scrolling: touch;

        }


        table {

            width: 100%;

            min-width: 1000px;

            border-collapse: collapse;

        }


        thead {

            background: #f9fafb;

        }


        th {

            text-align: left;

            padding: 15px;

            font-size: 13px;

            color: #6b7280;

            white-space: nowrap;

        }


        td {

            padding: 16px 15px;

            border-top:

                1px solid #eeeeee;

            vertical-align: top;

            font-size: 14px;

        }


        tbody tr {

            transition: 0.2s;

        }


        tbody tr:hover {

            background: #fafafa;

        }


        .id {

            font-weight: bold;

            color: #6b7280;

        }


        .name {

            font-weight: 600;

        }


        .email {

            color: #2563eb;

            text-decoration: none;

        }


        .email:hover {

            text-decoration: underline;

        }


        .subject {

            font-weight: 500;

        }


        .message {

            max-width: 350px;

            line-height: 1.5;

            color: #4b5563;

            word-break: break-word;

        }


        /* =========================
           DELETE BUTTON
        ========================= */

        .delete-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 5px;

            padding: 9px 13px;

            background: #fee2e2;

            color: #dc2626;

            text-decoration: none;

            border-radius: 8px;

            font-size: 13px;

            font-weight: 600;

            border: 1px solid #fecaca;

            cursor: pointer;

            transition: all 0.2s ease;

            white-space: nowrap;

        }


        .delete-btn:hover {

            background: #dc2626;

            color: white;

            border-color: #dc2626;

        }


        /* =========================
           EMPTY
        ========================= */

        .empty {

            text-align: center;

            padding: 60px 20px;

            color: #6b7280;

        }


        .empty-icon {

            font-size: 45px;

            margin-bottom: 10px;

        }


        .empty h3 {

            color: #111827;

            margin-bottom: 6px;

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 800px) {


            .topbar {

                padding: 15px 18px;

            }


            .brand h2 {

                font-size: 17px;

            }


            .brand p {

                font-size: 11px;

            }


            .logo {

                width: 40px;

                height: 40px;

                font-size: 18px;

            }


            .logout {

                padding: 9px 12px;

                font-size: 13px;

            }


            .container {

                padding: 20px 15px;

            }


            .welcome h1 {

                font-size: 25px;

            }


            .stats {

                grid-template-columns: 1fr;

                gap: 14px;

            }


            .stat-card {

                padding: 18px;

            }


            .message-box {

                padding: 18px;

                border-radius: 13px;

            }


            .message-header {

                flex-direction: column;

                align-items: stretch;

            }


            .search {

                width: 100%;

            }


            .table-wrapper {

                margin-top: 5px;

            }

        }


        /* =========================
           SMALL MOBILE
        ========================= */

        @media (max-width: 480px) {


            .topbar {

                align-items: flex-start;

            }


            .brand {

                gap: 9px;

            }


            .brand h2 {

                font-size: 15px;

            }


            .brand p {

                display: none;

            }


            .logout {

                font-size: 12px;

                padding: 8px 10px;

            }


            .welcome h1 {

                font-size: 22px;

            }


            .welcome p {

                font-size: 13px;

            }


            .stat-card {

                padding: 16px;

            }


            .stat-icon {

                width: 48px;

                height: 48px;

                font-size: 21px;

            }


            .stat-card strong {

                font-size: 22px;

            }


            .message-box {

                padding: 15px;

            }


            .message-header h2 {

                font-size: 18px;

            }


            table {

                min-width: 950px;

            }

        }

    </style>

</head>


<body>


<!-- =========================
     TOPBAR
========================= -->

<header class="topbar">


    <div class="brand">


        <div class="logo">
            H
        </div>


        <div>

            <h2>
                Haris Admin
            </h2>

            <p>
                Portfolio Dashboard
            </p>

        </div>


    </div>


    <a
        href="logout.php"
        class="logout"
        onclick="
            return confirm(
                'Are you sure you want to logout?'
            );
        "
    >
        Logout
    </a>


</header>



<!-- =========================
     MAIN CONTENT
========================= -->

<main class="container">


    <section class="welcome">

        <h1>
            Dashboard
        </h1>

        <p>
            Manage messages received from your portfolio.
        </p>

    </section>



    <!-- =========================
         STATISTICS
    ========================= -->

    <section class="stats">


        <div class="stat-card">

            <div class="stat-icon">
                📩
            </div>

            <div>

                <span>
                    Total Messages
                </span>

                <strong>
                    <?= $totalMessages ?>
                </strong>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                👤
            </div>

            <div>

                <span>
                    Admin
                </span>

                <strong>
                    Active
                </strong>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                🌐
            </div>

            <div>

                <span>
                    Website
                </span>

                <strong>
                    Online
                </strong>

            </div>

        </div>


    </section>



    <!-- =========================
         CONTACT MESSAGES
    ========================= -->

    <section class="message-box">


        <div class="message-header">


            <div>

                <h2>
                    Contact Messages
                </h2>

                <p>
                    All messages submitted through your website.
                </p>

            </div>


            <input
                type="text"
                id="search"
                class="search"
                placeholder="🔎 Search messages..."
            >


        </div>



        <?php if ($totalMessages > 0): ?>


        <div class="table-wrapper">


            <table id="messageTable">


                <thead>

                <tr>

                    <th>
                        ID
                    </th>

                    <th>
                        Name
                    </th>

                    <th>
                        Email
                    </th>

                    <th>
                        Subject
                    </th>

                    <th>
                        Message
                    </th>

                    <th>
                        Action
                    </th>

                </tr>

                </thead>


                <tbody>


                <?php while (
                    $row = $result->fetch_assoc()
                ): ?>


                <tr>


                    <td class="id">

                        #<?= htmlspecialchars(
                            $row["id"]
                        ) ?>

                    </td>



                    <td class="name">

                        <?= htmlspecialchars(
                            $row["name"]
                        ) ?>

                    </td>



                    <td>

                        <a
                            class="email"
                            href="mailto:<?= htmlspecialchars(
                                $row["email"]
                            ) ?>"
                        >

                            <?= htmlspecialchars(
                                $row["email"]
                            ) ?>

                        </a>

                    </td>



                    <td class="subject">

                        <?= htmlspecialchars(
                            $row["subject"]
                            ?: "No Subject"
                        ) ?>

                    </td>



                    <td class="message">

                        <?= nl2br(
                            htmlspecialchars(
                                $row["message"]
                            )
                        ) ?>

                    </td>



                    <td>


                        <a
                            href="delete.php?id=<?= (int)$row["id"] ?>"
                            class="delete-btn"
                            onclick="
                                return confirm(
                                    '⚠️ Are you sure you want to delete this message? This action cannot be undone.'
                                );
                            "
                        >

                            🗑️ Delete

                        </a>


                    </td>


                </tr>


                <?php endwhile; ?>


                </tbody>


            </table>


        </div>


        <?php else: ?>


        <div class="empty">

            <div class="empty-icon">
                📭
            </div>

            <h3>
                No Messages Yet
            </h3>

            <p>
                Messages submitted through your contact form
                will appear here.
            </p>

        </div>


        <?php endif; ?>


    </section>


</main>



<!-- =========================
     SEARCH
========================= -->

<script>

const search =
    document.getElementById("search");

const table =
    document.getElementById("messageTable");


if (search && table) {

    search.addEventListener(
        "input",
        function () {

            const value =
                this.value
                .toLowerCase()
                .trim();


            const rows =
                table.querySelectorAll(
                    "tbody tr"
                );


            rows.forEach(
                function (row) {

                    const text =
                        row.textContent
                        .toLowerCase();


                    row.style.display =
                        text.includes(value)
                            ? ""
                            : "none";

                }
            );

        }
    );

}

</script>


</body>

</html>


<?php

$conn->close();

?>
