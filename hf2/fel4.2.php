<?php

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

$nagybetusSzinek=array_map(function ($szin) {return strtoupper($szin);}, $szinek);
$kisbetusSzinek=array_map(function ($szin) {return strtolower($szin);},$szinek);
print_r($kisbetusSzinek);
echo "</br>";
print_r($nagybetusSzinek);

?>
