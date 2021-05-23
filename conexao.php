<?php

//? Ideal é passar isso para um arrquivo a parte
//? Setando o banco como parametro para caso queira mude depois
//? Criando um objeto PDO para depois criar uma conexão com o banco, estando em uma função fica dinamico.
function novaConexao($banco = 'curso_php')
{
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco",
        $usuario, $senha);
    }catch(PDOException $e){
        die("Error: " . $e->getMessage());
    }

    return $conexao;
}