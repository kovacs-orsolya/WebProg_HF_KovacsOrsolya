<?php
$szin='lightblue';
$szorzotabla=function() use ($szin){
    echo "<table border='2'>";
for ($i = 1; $i <= 10; $i++){
    echo "<tr>";
    for($j = 1 ; $j <= 10; $j++){
        echo"<td width=10px height=10px style=background-color:". (($j==$i) ? $szin : "white")."; border: 2px solid black;>".$j*$i."</td>";
    }
    echo "</tr>";
}
echo "</table>";
};
$szorzotabla();
?>