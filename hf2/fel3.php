<?php
$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
    );
    foreach ($napok as $nyelv => $napLista) {
        echo "<p><b>$nyelv:</b> ";
        for ($i=0; $i<count($napLista); $i++ ){
            if ($i%2==1) {
                echo " <b>".$napLista[$i]."</b>";
            }else{
                echo " ".$napLista[$i];
            }
            if ($i < count($napLista) - 1) {
                echo ", ";
            }
        }
        echo "</p>";
    }
?>