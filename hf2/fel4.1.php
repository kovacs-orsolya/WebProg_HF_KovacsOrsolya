<?php
// Klasszikus módszer kisbetűs/nagybetűs átalakításra
function atalakitKisbetus($tomb) {
    foreach ($tomb as $kulcs => $ertek) {
        $tomb[$kulcs] = strtolower($ertek);
    }
    return $tomb;
}

function atalakitNagybetus($tomb) {
    foreach ($tomb as $kulcs => $ertek) {
        $tomb[$kulcs] = strtoupper($ertek);
    }
    return $tomb;
}

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

$kisbetusSzinek = atalakitKisbetus($szinek);
$nagybetusSzinek = atalakitNagybetus($szinek);

print_r($kisbetusSzinek);
echo "</br>";
print_r($nagybetusSzinek);
?>
