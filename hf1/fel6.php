<?php

$honap=2;

switch ($honap){
    case 3:
    case 4:
    case 5:
        echo "<p>Tavasz</p>";
        break;
    case 6:
    case 7:
    case 8:
        echo "<p>Nyár</p>";
        break;
    case 9:
    case 10:
    case 11:
        echo "<p>Ősz</p>";
        break;
    case 1:
    case 2:
    case 12:
        echo "<p>Tél</p>";
        break;
    default :
        echo "<p>Érvénytelen hónap.</p>";
        break;
}


?>
