<h1> CRIAR TABELA </H1><hr>

<?php
require_once "conexao.php";

$sql = "CREATE TABLE IF NOT EXISTS cadastro(
    id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL,
    nascimento DATE,
    email varchar(100) NOT NULL,
    site VARCHAR(100),
    filhos INT,
    salario FLOAT
)";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado){
    echo "Sucesso";
}else{
    echo "Erro" . $conexao->error;
}

$conexao->close();