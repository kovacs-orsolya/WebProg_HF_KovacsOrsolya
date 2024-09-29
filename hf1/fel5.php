<?php

$a = 8;
$b = 4;
$jel='/';
switch ($jel){
    case '+':{
        $osszeadas = $a + $b;
        echo "<p>$a + $b = {$osszeadas}</p>";
    }
    break;
    case '-':{
        $kivonas = $a - $b;
        echo "<p>$a - $b = $kivonas</p>";
    }
    break;
    case "*":{
        $szorzas = $a * $b;
        echo "<p>$a * $b = $szorzas</p>";
    }
    break;
    case "/":{
        if ($b != 0) {
            $osztas = $a / $b;
            echo "<p> $a / $b = $osztas</p>";
        } else {
            echo "<p>Az osztás nem végezhető el, mert a második szám 0.</p>";
        }
    }
    break;
    default :{
        echo "<p>Érvénytelen műveleti jel.</p>";
    }
    break;
}


?>
