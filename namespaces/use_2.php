<?php 
namespace Importando\UseAs;
echo "<h1> importando Use\As </h1>";

echo __NAMESPACE__ . "<hr>";

include('use.php');

function soma($a, $b){return $a.$b;}

class Classe{
    public $var;

    function func(){
        echo __NAMESPACE__ . "<hr>" . __CLASS__ . __METHOD__ . "<hr>";
    }

}

echo \Nome\Bem\Grande\constante . "<hr>"; 

use const \Nome\Bem\Grande\constante;
echo constante . "<hr>";

use Nome\Bem\Grande as ctx;

echo soma(1222,323) . "<hr>";

//use function \Nome\Bem\Grande\soma;
use function \Nome\Bem\Grande\soma as somaReal;
echo somaReal(1222,323) . "<hr>";

$a = new Classe;
$a->func();

$b = new  \Nome\Bem\Grande\Classe;
$b->func();

$c = new ctx\Classe;
$c->func();

use \Nome\Bem\Grande\Classe as D;
$d = new D();
$d->func();