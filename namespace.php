<?php 
//! Tem que ser a primeira sentença de codigo do arquivo
namespace Contexto;
?>
<h1> NameSpace </h1>
<?php

//? Constante do PHP que exibe o namespace atual do arquivo
echo __NAMESPACE__ . "<hr>";

//? Quando se define uma constante assim, essa constante é definida automaticamente ao escopo do namespace.
const constante1 = 1;

//? ou e no caso esta definido no namespace RAIZ DO PHP
define('constante_1_1', 11);

//? Outra forma de definir constantes em um namespace é passando o nome dele e o nome da constante ao fim
define('contexto\constante2', 2);

//? Também é possivel definir dessa forma aproveitando a variavel do PHP ( __NAMESPACE__ . 'nome_constante')
define( __NAMESPACE__ . '\constante3', 3);

//? Com o define tambem se consegue criar uma constante em um namespace que ainda não "existe"
define( 'naoexisto\constante4', 4);
// echo constante4 . "<hr>";

//! Chamando da raiz do PHP
echo constante1 . "<hr>";
echo constante_1_1 . "<hr>";

//! Constante criada com define e namespace relativo
echo constante2 . "<hr>";

//! criada com a função namespace do PHP
echo constante3 . "<hr>";

//! Acessando com caminho relativo a \representa pra puxar da raiz do namespace caso nao tivese \
//! iria entender pra puxar asssim: contexto\naoexisto\constante4
//! vai causar erro pois nao passou o caminho certo
echo \naoexisto\constante4 . "<hr>";
// echo contexto\constante5 . "<hr>";

//! Dá pra acessar assim
echo constant(__NAMESPACE__ . '\constante2');

//? Também é possivel acessar funções
function soma($a,$b){return $a+$b;}

echo "<hr>" . soma(4,19) . "<hr>";

//! ou chamando pelo namespace contexto
echo \contexto\soma(4,222);

//! Como não conflitar com as API do php
//! aqui vai pegar do namespace contexto ou seja a função que crieei
function strpos($a, $b){return "string {$a} buscar {$b}";}
echo strpos('abc', 'b');

//! assim chama a api do PHP pois está com a barra na frente isso leva ao namespace raiz da aplicação
echo \strpos('abc', 'b');


