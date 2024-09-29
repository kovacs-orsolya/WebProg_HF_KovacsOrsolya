<?php

$a = 8;
$b = 4;

$osszeadas = $a + $b;
echo "<p>$a + $b = {$osszeadas}</p>";

$kivonas = $a - $b;
echo "<p>$a - $b = $kivonas</p>";


$szorzas = $a * $b;
echo "<p>$a * $b = $szorzas</p>";


if ($b != 0) {
    $osztas = $a / $b;
    echo "<p> $a / $b = $osztas</p>";
} else {
    echo "<p>Az osztás nem végezhető el, mert a második szám 0.</p>";
}

?>
