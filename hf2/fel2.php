<?php
$orszagok = array("Magyarország"=>"Budapest", "Románia"=>"Bukarest","Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");

foreach ($orszagok as $key => $value) {
    echo "<p>$key fővárosa<span style='color:red;'> $value</span>.<p>";
    }
?>