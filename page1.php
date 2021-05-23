<h1> CRIAR BANCO DE DADOS </H1><hr>
<?php

//? Incluindo arquivo de conexão
require_once "conexao.php";

//? Recebendo nova conexão
$conexao = novaConexao(null);

//? SQL PARA CRIAR O BANCO DE DADOS, SE NAO EXISTIR CRIA
$sql = "CREATE DATABASE IF NOT EXISTS curso_php";
$resultado = $conexao->query($sql);

if($resultado){
    echo "conectado";
}else{
    echo "Erro" . $conexao->error;
}

$conexao->close();