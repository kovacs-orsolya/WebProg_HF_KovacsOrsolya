<?php
session_start();
include_once("database_connect.php");
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
if(isset($_POST["elkuld"])){
    $nev=$_POST["nev"];
    $szak=$_POST["szak"];
    $atlag=(float)$_POST["atlag"];
    $smt = $conn->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?);");
    $smt->bind_param("ssd", $nev, $szak, $atlag);
    $smt->execute();
    $conn->commit();
    $smt->close();

    echo "Sikeres<br>";
    echo "<a href='listazas.php'>Listazas<a/><br>";
    echo "<a href='bevitel.php'>Új hallgató<a/><br>";
   

}
$conn->close();
echo "<a href='login.php'>Login<a/><br>";
?>

<form method="POST" action="">
Név: <input type="text" name="nev" value="">
<br><br>
Szak: <input type="text" name="szak" value="">
<br><br>
Atlag: <input type="text" name="atlag" value="">
<br><br>
<input type="submit" name="elkuld" value="Elküldés">
</form>