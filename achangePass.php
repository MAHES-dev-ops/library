<?php 
session_start(); 
include "database.php";  
if (!isset($_SESSION["AID"])) {     
    header("location:alogin.php"); 
    exit;
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
            <h3 id="header">Change Password</h3>            
            <div id="center">                 
                <?php             
                if(isset($_POST["submit"])) {                 
                    // Using prepared statement to prevent SQL injection
                    $stmt = $db->prepare("SELECT * FROM admin WHERE APASS = ? AND AID = ?");
                    $stmt->bind_param("si", $_POST["opass"], $_SESSION["AID"]);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    
                    if($res->num_rows > 0) {                     
                        // Update password with prepared statement
                        $update_stmt = $db->prepare("UPDATE admin SET APASS = ? WHERE AID = ?");
                        $update_stmt->bind_param("si", $_POST["npass"], $_SESSION["AID"]);
                        $update_stmt->execute();
                        echo "<p class='success'>Password changed successfully</p>";                 
                    } else {                     
                        echo "<p class='error'>Invalid password</p>";                 
                    }             
                }         
                ?>             
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">                 
                    <label>Old Password</label>                 
                    <input type="password" name="opass" required>                 
                    <label>New Password</label>                 
                    <input type="password" name="npass" required>                 
                    <button type="submit" name="submit">Update Password</button>             
                </form>         
            </div>         
        </div>         
        <div id="navi">             
            <?php             
            include "adminsidebar.php";             
            ?>         
        </div>     
    </div> 
</body> 
</html>
