<?php
session_start();
include "database.php";
function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
} 
if(!isset($_SESSION["AID"]))
{
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
			    <h3 id="header"> Welcome Admin</h3>
				<div id="center">
                    <ul class="record">
                        <li>Total Student  : <?php echo countRecord("SELECT * FROM student", $db); ?></li>
                        <li>Total Books    : <?php echo countRecord("SELECT * FROM book", $db); ?></li>
                        <li>Total Request  : <?php echo countRecord("SELECT * FROM request", $db); ?></li>
                        <li>Total Comments : <?php echo countRecord("SELECT * FROM comment", $db); ?></li>

                    </ul>
				</div>
            </div>
            <div id="navi">
			    <?php
				    include "adminsidebar.php";
				?>
            </div>
			</div>
           
        </div>
    </body> 
    </html>