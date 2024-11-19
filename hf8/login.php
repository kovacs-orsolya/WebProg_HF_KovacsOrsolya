<?php
session_start();
include_once("database_connect.php");
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $smt = $conn->prepare("SELECT pdword FROM users WHERE username = ?");
    $smt->bind_param("s", $username); // Bind the username parameter
    $smt->execute();
    $smt->bind_result($pdword);
    if($smt->fetch()){
        if($password === $pdword){
            $_SESSION["username"] = $username;
            header("Location: listazas.php");
            exit();
        }else{
            echo "Sikertelen bejelentkezés!";
        }
    }
    
    $smt->close();    
}


$conn->close();
?>




<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
<h1>Login</h1>
<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value=""><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value=""><br>


    <input type="submit" name="submit" value="Login">
</form>
</body>
</html>