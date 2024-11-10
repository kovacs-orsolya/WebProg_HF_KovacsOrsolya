<?php


session_start(); 

$uzenet = ""; 
$talalgatas = "";

if (!isset($_COOKIE['randomSzam'])) {
    setcookie("randomSzam", rand(1, 10),time()+(60*60), "/");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $talalgatas = (int)($_POST['talalgatas']); 
    $randomSzam = (int)$_COOKIE['randomSzam']; 


    if ($talalgatas > $randomSzam) {
        $uzenet = "A szám kisebb";
    } elseif ($talalgatas < $randomSzam) {
        $uzenet = "A szám nagyobb";
    } else {
        $uzenet = "Kitaláltad!";
        setcookie("randomSzam", "",time()-3600, "/");
        
    }
}
?>


<form method="POST" action="">
<input type="hidden" name="elkuldott" value="true">
Melyik számra gondoltam 1 és 10 között?
<input name="talalgatas" type="text" value="<?php echo $talalgatas ?>">
<br>
<br>
<input type="submit" value="Elküld">
</form>

<?php echo "<p>$uzenet</p>"; ?>