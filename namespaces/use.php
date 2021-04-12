<?php 
namespace Nome\Bem\Grande;
echo "<h1> Use/As </h1>";

echo __NAMESPACE__ . "<hr>";
const constante = 1;
function soma($a, $b){return $a+$b;}

class Classe{
    public $var;

    function func(){
        echo __NAMESPACE__ . "<hr>" . __CLASS__ . __METHOD__ . "<hr>";
    }

}