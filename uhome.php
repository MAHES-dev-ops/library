<?php
session_start();
include "database.php";
if(!isset($_SESSION["ID"]))
{
    header("location:ulogin.php");
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
			    <h3 id="header"> Welcome <?php echo $_SESSION["NAME"];?></h3>
            </div>
            <div id="navi">
			    <?php
				    include "usersidebar.php";
				?>
            </div>
			</div>
           
        </div>
    </body> 
    </html>