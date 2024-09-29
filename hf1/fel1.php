<?php
$tomb = array(5, '5','05',12.3,'13.7','five','true',0xDECAFBAD,'10e200');
foreach ($tomb as $elem){
    echo $elem.' '.gettype( $elem ).' is numeric '.(is_numeric( $elem ) ? 'Igen' : 'Nem').'<br/>';
}
?>