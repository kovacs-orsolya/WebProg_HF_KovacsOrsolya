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
$terms = "";
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


<h3>Online conference registration</h3>
<form method="post" action="selfProcess.php">
    <label for="fname"> First name:
    <input type="text" name="firstName" value="<?php echo $firstName; ?>">
    </label>

    <br><br>

    <label for="lname"> Last name:
    <input type="text" name="lastName" value="<?php echo $lastName; ?>">
    </label>

    <br><br>

    <label for="email"> E-mail:
    <input type="text" name="email" value="<?php echo $email; ?>">
    </label>

    <br><br>

    <label for="attend"> I will attend:<br>
    <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
    <input type="checkbox" name="attend[]" value="Event2">Event2<br>
    <input type="checkbox" name="attend[]" value="Event3">Event2<br>
    <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>

    <br><br>

    <label for="tshirt"> What's your T-Shirt size?<br>
    <select name="tshirt" selected="<?php echo $tshirt; ?>">
        <option value="P">Please select</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
    </select>
    </label>

    <br><br>
    <label for="abstract"> Upload your abstract<br>
    <input type="file" name="abstract"/>
    </label>

    <br><br>

    <input type="checkbox" name="terms" value="<?php echo $terms; ?>">I agree to terms &
    conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>