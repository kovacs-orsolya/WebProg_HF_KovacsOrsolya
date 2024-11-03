<?php
$nameError = "";
$name = "";
$emailError = "";
$email = "";
$passowrdError = "";
$password = "";
$birthdateError = "";
$birthdate = "";
$genderError ="";
$gender = "";
$interests = "";
$country = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['name'])) {
        $nameError = "A név megadása kötelező.";
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

    
    if (empty($_POST['email'])) {
        $emailError = "Az email cím megadása kötelező.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailError = "Érvénytelen email formátum.";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }


    if (empty($_POST['password'])) {
        $passowrdError = "A jelszó megadása kötelező.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\ d)(?=.*[ @$ !%*?&])[A-Za -z\ d@$ !%*?&]{8 ,} $/", $_POST['password'])) {
        $passowrdError = "A jelszónak legalább 8 karakterből kell állnia, és tartalmaznia kell 1 nagybetűt, számot és speciális karaktert.";
    } else {
        $password = htmlspecialchars($_POST['password']);
    }


    if (empty($_POST['confirm_password'])) {
        $passowrdError = "A jelszó megerősítése kötelező.";
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $passowrdError = "A jelszavak nem egyeznek.";
    }

    if (empty($_POST['birthdate'])) {
        $birthdateError = "A születési dátum megadása kötelező.";
    }else if ($_POST['birthdate']>date("Y-m-d", $_SERVER["REQUEST_TIME"])){
        $birthdateError = "A születési dátum hibás.";
    } else {
        $birthdate = htmlspecialchars($_POST['birthdate']);
    }

    if (empty($_POST['gender'])) {
        $genderError = "A nem kiválasztása kötelező.";
    } else {
        $gender = $_POST['gender'];
    }

    if (isset($_POST['interests'])) {
        $interests = $_POST['interests'];
    }

    $country = $_POST['country'] ?? '';

    if ($nameError == "" && $emailError == "" && $passowrdError == "" && $birthdateError == "") {
        echo "<h3>Regisztráció sikeres!</h3>";
        echo "<p><strong>Név:</strong> " . $name . "</p>";
        echo "<p><strong>Email:</strong> " . $email . "</p>";
        echo "<p><strong>Születési dátum:</strong> " .$birthdate . "</p>";
        echo "<p><strong>Nem:</strong> " . $gender . "</p>";
        echo "<p><strong>Érdeklődési területek:</strong> " . implode(", ", $interests) . "</p>";
        echo "<p><strong>Ország:</strong> " . $country . "</p>";
    } else {
        echo "<p>" . $nameError . "</p>";
        echo "<p>" . $emailError. "</p>";
        echo "<p>" . $passowrdError . "</p>";
        echo "<p>". $birthdateError ."</p>";  
    }
}
?>

<h3>Regisztrációs űrlap</h3>
<form method="post" action="" enctype="multipart/form-data">
    <label>Név: <input type="text" name="name" value="<?php echo $name; ?>"></label><br><br>

    <label>E-mail cím: <input type="text" name="email" value="<?php echo $email; ?>"></label><br><br>

    <label>Jelszó: <input type="password" name="password"></label><br><br>

    <label>Jelszó megerősítése: <input type="password" name="confirm_password"></label><br><br>

    <label>Születési dátum: <input type="date" name="birthdate" value="<?php echo $brithdate; ?>"></label><br><br>

    <label>Nem:</label>
    <input type="radio" name="gender" value="ferfi"> Férfi
    <input type="radio" name="gender" value="no"> Nő
    <input type="radio" name="gender" value="egyeb"> Egyéb
    <br><br>

    <label>Érdeklődési területek:</label><br>
    <input type="checkbox" name="interests[]" value="Sport"> Sport<br>
    <input type="checkbox" name="interests[]" value="Művészet"> Művészet<br>
    <input type="checkbox" name="interests[]" value="Tudomány"> Tudomány<br><br>

    <label>Ország:</label>
    <select name="country">
        <option value="">Válasszon</option>
        <option value="Magyarország">Magyarország</option>
        <option value="Németország">Németország</option>
        <option value="Franciaország">Franciaország</option>
    </select><br><br>

    <input type="submit" name="submit" value="Regisztráció">
</form>
