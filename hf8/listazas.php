<?php
session_start();
include_once("database_connect.php");


$smt = $conn->prepare("SELECT * FROM hallgatok");
$smt->execute();
$result = $smt->get_result();
echo "<a href='bevitel.php'>Új hallgató<a/><br>";
echo "<a href='login.php'>Login<a/><br>";
if($result->num_rows >0){
    echo "<table border=1>
            <tr>
            <th>Id</th>
            <th>Nev</th>
            <th>Szak</th>
            <th>Atlag</th>
        </tr>";
    while($row=$result->fetch_assoc()){
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nev']}</td>
            <td>{$row['szak']}</td>
            <td>{$row['atlag']}</td>
            <td><a href='update.php?id=".$row["id"]."'>Update</a></td>
            <td><a href='delete.php?id=".$row["id"]."'>Delete</a></td>
            </tr>";
        //echo $row["id"] . " " . $row["nev"] . " " . $row["szak"] . " " . $row["atlag"] . "<br>";
    }
}
$smt->close();
$conn->close();
?>