<?php

function str_to_hex($string){ 
   return array_shift(unpack('H*', $string))
    ;}
function hex_to_str($string){
    return hex2bin("$string");
}



?>
