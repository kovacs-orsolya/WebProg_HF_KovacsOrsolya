<?php
$servername = "localhost";
$username = "root";
$password = "";
$con = new mysqli($servername,$username,$password);

if($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}else{
    echo "Connected succesfully<br>";
}

$sql = "CREATE DATABASE IF NOT EXISTS egyetem";

if($con->query($sql) === TRUE){
    echo "Database created succesfully<br>";
}else{
    echo "Error creating database: ". $con->error . "<br>";
}   
$con->select_db("egyetem");

$sql = "CREATE TABLE IF NOT EXISTS hallgatok (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(255) NOT NULL,
    szak VARCHAR(255) NOT NULL,
    atlag DOUBLE NOT NULL) ";

if($con->query($sql) === TRUE){
    echo "Table created succesfully<br>";
}else{
    echo "Error creating table: ". $con->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    pdword VARCHAR(255) NOT NULL);";

if($con->query($sql) === TRUE){
    echo "Table created succesfully<br>";
}else{
    echo "Error creating table: ". $con->error . "<br>";
}

$con->close();