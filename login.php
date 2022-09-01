<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('127.0.0.1:3306','root','','arooj') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM login_user WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }
?>
<style><?php include 'C:\Users\user1\Desktop\arooj\login.css'; ?></style>

 


 





<!DOCTYPE html>
<html lang="en">
<head>
   <title>User Login</title> 
     
    <link rel="stylesheet" href="login.css">

      
</head>
<body>
  
    <form name="frmUser" method="post" action="" align="center">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
        <h3>Login</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Username" name="user_name" id="username">

        <label for="password">Password</label> 
        <input type="password" placeholder="Password" name="password" id="password">

        <button class="btn2" type="submit" name="submit" value="Submit">Log In</button>
        <button class="btn" type="reset" name="submit" value="Submit">Reset</button>

    </form>
</body>
</html>

 
 