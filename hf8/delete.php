<?php
session_start();
include_once("database_connect.php");
// Check connection
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $smt = $conn->prepare("DELETE FROM hallgatok WHERE id=?;");
    $smt->bind_param("i",$id);
    $smt->execute();
    header("Location: listazas.php");
    $smt->close();
    $conn->close();


}
$conn->close();

?>