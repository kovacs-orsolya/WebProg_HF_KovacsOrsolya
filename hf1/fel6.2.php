<?php

$honap=5;
if ($honap==1 or $honap== 2 or $honap== 12){
    echo "<p>Tél</p>";
} elseif ($honap== 3 or $honap== 4 or $honap== 5){
    echo "<p>Tavasz</p>";
} elseif ($honap== 6or $honap== 7 or $honap== 8){
    echo "<p>Nyár</p>";
} elseif ($honap== 9 or $honap== 10 or $honap== 11){
    echo "<p>Ősz</p>";
} else{
    echo "<p>Érvénytelen hónap.</p>";
}

?>
