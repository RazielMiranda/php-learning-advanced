<?php

$var = 'included ';

echo "arquivo {$var} <hr>";

if(!function_exists('soma')){
    function soma($a, $b){return $a+$b;}
}