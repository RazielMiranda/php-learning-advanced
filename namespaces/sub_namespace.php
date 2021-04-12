<?php namespace App; ?>
<h1> Sub namespace </h1>

<?php

//! nivel 0: namespace App
echo __NAMESPACE__ . "<hr>";
const constante = 0;

namespace App\Principal;
//! nivel 1: namespace Principal
echo __NAMESPACE__ . "<hr>";
const constante = 1;

namespace App\Principal\Especifico;
//! nivel 2: namespace Especifico
echo __NAMESPACE__ . "<hr>";
const constante = 2;

echo constante . "<hr>";
echo constant('\\' . __NAMESPACE__ . '\constante') . "<hr>";

echo \App\Principal\constante . "<hr>";
echo \App\Principal\Especifico\constante . "<hr>";

//! Não é comum ver uma estrutura dessa de codigo
//! geralmente se usa a estrutura de pastas como nome dos namespace
//! segue uma estrutura logica de caminhos
//! não é interessante forçar o nome de constantes