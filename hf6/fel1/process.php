<?php

$firstNameError = "";
$lastNameError= "";
$emailError = "";
$firstName = "";
$lastName = "";
$email = "";
$attendError = "";
$attend = "";
$fileError = "";
$file = "";
$termsError = "";
$tshirt = "P";

if(isset($_POST["submit"])){

    if(empty($_POST["lastName"])){
        $lastNameError="Name is required";
    }else{
        $lastName = htmlspecialchars($_POST["lastName"]);
    }

    if(empty($_POST["firstName"])){
        $firstNameError="Name is required";
    }else{
        $firstName = htmlspecialchars($_POST["firstName"]);
    }

    if(empty($_POST["email"])){
        $emailError="Email is required";
    }else{
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var( $email, FILTER_VALIDATE_EMAIL)){
            $emailError="Invalid email format";
        }
    }
    
    if (empty($_POST['attend'])) {
        $attendError = "Please select at least one event.";
    } else {
        $attend = $_POST['attend'];
    }


    $tshirt = $_POST['tshirt'] ?? "P";

    if (isset($_FILES['abstract']) && $_FILES['abstract']['error'] == 0) {
        $fileInfo = pathinfo($_FILES['abstract']['name']);
        $fileSize = $_FILES['abstract']['size'];
        $fileType = strtolower($fileInfo['extension']);
        
        if ($fileType !== 'pdf') {
            $fileError = "Only PDF files are allowed.";
        } elseif ($fileSize > 3 * 1024 * 1024) { 
            $fileError = "The file size must be less than 3MB.";
        } else {
            $file = $_FILES['abstract']['name'];
        }
    } else {
        $fileError = "Please upload an abstract in PDF format.";
    }

    if (empty($_POST['terms'])) {
        $termsError = "You must agree to the terms and conditions.";
    } else {
        $terms = true;
    }
    if ($lastNameError == "" && $firstNameError == "" && $emailError == "" && $fileError == "" && $termsError == ""){
        echo "<h3>Submitted Information</h3>";
        echo "<p><strong>First Name:</strong> " . $firstName . "</p>";
        echo "<p><strong>Last Name:</strong> " . $lastName . "</p>";
        echo "<p><strong>Email:</strong> " . $email. "</p>";
        echo "<p><strong>Events Attending:</strong> " . implode(", ", $attend) . "</p>";
        echo "<p><strong>T-Shirt Size:</strong> " . ($tshirt !== 'P' ? $tshirt : "Not selected") . "</p>";
        echo "<p><strong>Abstract File:</strong> " . $file . "</p>";
        echo "<p><strong>Terms Accepted:</strong> Yes</p>";  
    }else{

        echo "<p>" . $firstNameError . "</p>";
        echo "<p>" . $lastNameError . "</p>";
        echo "<p>" . $emailError. "</p>";
        echo "<p>". $attendError . "</p>";
        echo "<p>" . $fileError . "</p>";
        echo "<p>". $termsError ."</p>";  
    }
}
?>