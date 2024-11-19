<?php
include_once("database_connect.php");


// Hallgatók adatai
$studentsData = array(
    array('John Doe', 'Informatika', 5.2),
    array('Alice Smith', 'Műszaki Informatika', 7.9),
    array('Bob Johnson', 'Gazdaságinformatika', 8.8),
    array('Eva Wilson', 'Matematika', 9.5),
    array('Mike Brown', 'Fizika', 5.0),
    array('Sarah Davis', 'Kémia', 3.7),
    array('David Lee', 'Biológia', 8.1),
    array('Linda Martinez', 'Informatika', 8.8),
    array('Tom Miller', 'Műszaki Informatika', 5.3),
    array('Karen Wilson', 'Gazdaságinformatika', 6.5)
    );

foreach ($studentsData as $student){
    $nev = $student[0];
    $szak = $student[1];
    $atlag = $student[2];
    $smt = $conn->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES ('?', '?', '?');");
    $smt->bind_param("ssd",$nev,$szak, $atlag);
    if($smt->execute()){
        echo "New record created succesfully<br>";

    }else{
        echo "Error: ". $conn->error . "<br>"; 
    }
}

$users = array(
    array('Admin', 'secret'),
    array('girl1113', '0000'),
    array('Johnny', '1234'),
    );

foreach ($users as $user){
    $name = $user[0];
    $pdword = $user[1];
    $smt = $conn->prepare("INSERT INTO users (username, pdword) VALUES ('?', '?');");
    $smt->bind_param("ss",$name,$pdword);
    if($smt->execute()){
        echo "New record created succesfully<br>";

    }else{
        echo "Error: ". $conn->error . "<br>"; 
    }
}
$smt->close();
$conn->close();
?>