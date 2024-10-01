<?php

function hozzaad(&$lista, $nev, $mennyiseg, $egysegar) 
{
    array_push($lista,["nev" => $nev, "mennyiseg" => $mennyiseg, "egysegar" => $egysegar]) ;
}

function torol(&$lista,$nev)
{   
    foreach ($lista as $kulcs => $elem) {
        if ($elem['nev'] === $nev) {
            unset($lista[$kulcs]);
        }
    }
}

function kiir($lista)
{
    foreach ($lista as $kulcs => $elem) {
        echo $elem['nev'] . ": " . $elem['mennyiseg'] . " db, ár: " . $elem['egysegar']."<br>";
    }
}

function osszkoltseg($lista):float
{   
    $osszeg=0;
    foreach ($lista as $kulcs => $elem) {
        $osszeg+=$elem["egysegar"]*$elem["mennyiseg"];
    }
    return $osszeg;
}

$bevasarloLista=array(
    ["nev" => "Kenyer", "mennyiseg" => 2, "egysegar" => 8.5],
    ["nev" => "Viz", "mennyiseg" => 1, "egysegar" => 2.5]
);


hozzaad($bevasarloLista,"Liszt",3,3);
print_r($bevasarloLista);
echo "<br>";
torol($bevasarloLista,"Viz");
print_r($bevasarloLista);
echo "<br>";
kiir($bevasarloLista);
echo osszkoltseg($bevasarloLista);
?>