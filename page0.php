<h1> SESSÃO </H1><hr>
<?php

//? session_id('');
session_start();
echo session_id(); //! get or set

//? salvando endereço de memoria da sessao
$contador = &$_SESSION['contador'];
$contador = $contador ? $contador + 1 : 1;
echo '<br>' . $_SESSION['contador'];

if($_SESSION['contador'] % 5 === 0){
    //? É importante que regenere baseado em alguma regra de negocio. segurança;
    session_regenerate_id();
}

if($_SESSION['contador'] >= 15){
    //? destroi a sessao
    session_destroy();
}