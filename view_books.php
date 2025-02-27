<?php
session_start();
include "database.php";

if (!isset($_SESSION["AID"])) {
    header("location:alogin.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Tutor Joes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>E-Library Management System</h1>
        </div>
        <div id="wrapper">
            <h3 id="header">View Books Details </h3>
            <?php
            $sql = "SELECT * FROM book";
            $res = $db->query($sql);

            if ($res->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>SNO</th>
                            <th>BOOK NAME</th>
                            <th>KEYWORDS</th>
                            <th>VIEW</th>
                        </tr>";
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    $i++;
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$row['BTITLE']}</td>";
                    echo "<td>{$row['KEYWORDS']}</td>";
                    echo "<td><a href='{$row['FILE']}' target='_blank'>view</a> | <a href='{$row['FILE']}' download>download</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='error'>No Books Records Found</p>";
            }
            ?>
        </div>
        <div id="navi">
            <?php
            include "adminsidebar.php";
            ?>
        </div>
    </div>
</body>
</html>
