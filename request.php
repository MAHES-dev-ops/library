<?php 
session_start(); 
include "database.php";  
if (!isset($_SESSION["ID"])) {     
    header("location:ulogin.php"); 
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
            <h3 id="header">New Book Request</h3>            
            <div id="center">                 
                <?php             
                if(isset($_POST["submit"])) {                 
                   $sql="insert into request (ID,MES,LOGS) values({$_SESSION["ID"]},'{$_POST["mess"]}',now())";
                   $db->query($sql);
                   echo "<p class='success'> Request Sent Admin</p>";          
                }         
                ?>             
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">                                 
                    <label>Message</label>
                    <textarea required name="mess"></textarea>                                 
                    <button type="submit" name="submit"> Send Message</button>             
                </form>         
            </div>         
        </div>         
        <div id="navi">             
            <?php             
            include "usersidebar.php";             
            ?>         
        </div>     
    </div> 
</body> 
</html>
