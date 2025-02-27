<?php
session_start();
include "database.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Forgot Password</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>E-Library Management System</h1>
            </div>
            <div id="wrapper">
                <h3 id="header"> Forgot Password</h3>
                <div id="center">
                <?php
                    if(isset($_POST["submit"])) {
                        $name = $_POST["name"];
                        $newPassword = $_POST["newPassword"];
                        $confirmPassword = $_POST["confirmPassword"];

                        // Check if name exists in the student table
                        $sql = "SELECT * FROM student WHERE NAME='{$name}'";
                        $res = $db->query($sql);
                        
                        if($res->num_rows > 0) {
                            // Check if the new password and confirm password match
                            if($newPassword === $confirmPassword) {
                                // Update the password in the database
                                $updateSql = "UPDATE student SET PASS='{$newPassword}' WHERE NAME='{$name}'";
                                if($db->query($updateSql)) {
                                    echo "<p>Password reset successful.</p>";
                                } else {
                                    echo "<p class='error'>Error updating password</p>";
                                }
                            } else {
                                echo "<p class='error'>Passwords do not match</p>";
                            }
                        } else {
                            echo "<p class='error'>Name not found</p>";
                        }
                    }
                ?>
                <form action="forgot-password.php" method="post">
                    <label>Name</label>
                    <input type="text" name="name" required>

                    <label>New Password</label>
                    <input type="password" name="newPassword" required>

                    <label>Confirm Password</label>
                    <input type="password" name="confirmPassword" required>

                    <button type="submit" name="submit">Reset Password</button>
                </form>
                <p><a href="ulogin.php">Back to Login</a></p>
                </div>
            </div>
            <div id="navi">
                <?php
                    include "sidebar.php";
                ?>
            </div>
        </div>
    </body> 
</html>
