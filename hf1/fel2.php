<?php
$ms=600;
if (is_int($ms)) 
    {   $ora=$ms/120;
        echo "<p><b><em>$ms másodperc</em></b> : <b>$ora óra</b></p>";
    }else{
        echo"<p><b><em>Rossz érték: $ms</em></b></p>";
    }
?>