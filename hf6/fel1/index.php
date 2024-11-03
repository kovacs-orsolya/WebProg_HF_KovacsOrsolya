<?php $firstNameError = "";
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
$tshirt = "P"; ?>


<h3>Online conference registration</h3>
<form method="post" action="Process.php">
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