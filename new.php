<?php 
include "database.php";  
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
            <h3 id="header">New User Registration </h3>            
            <div id="center">                 
                <?php             
                if(isset($_POST["submit"]))
                {
                    // Corrected SQL query with closing parenthesis
                    $sql = "INSERT INTO student(NAME, PASS, MAIL, DEP) VALUES ('{$_POST["name"]}', '{$_POST["pass"]}', '{$_POST["mail"]}', '{$_POST["dep"]}')";
                    if ($db->query($sql) === TRUE) {
                        echo "<p class='success'>User Registration success</p>";
                    } else {
                        echo "<p class='error'>Error: " . $db->error . "</p>";
                    }
                }         
                ?>             
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">                 
                    <label>Name </label>                 
                    <input type="text" name="name" required>     
                    <label>Password </label>                 
                    <input type="password" name="pass" required> 
                    <label>Email</label>                 
                    <input type="email" name="mail" required> 
                    <select name="dep" required>
                        <option value="">Select</option>
                        <option value="BCA">BCA</option>
                        <option value="CSC">CSC</option>
                        <option value="IT">IT</option>
                        <option value="MECH">MECH</option>
                        <option value="EEE">EEE</option>
                        <option value="ECE">ECE</option>
                        <option value="AIDS">AIDS</option>
                        <option value="OTHERS">OTHERS</option>
                    </select>
                    <button type="submit" name="submit">Register Now</button>                          
                </form>         
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
