<h1> INSERT PDO</h1>
<hr>

<?php
require_once 'conexao.php';

$sql = "INSERT INTO cadastro
(nome, email, nascimento, site, filhos, salario)
VALUES (
    'Guilherme',
    'gui@gmail.com',
    '1999-1-1',
    'http://guidalara.com',
    0,
    2111
)";

$conexao = novaConexao();

// print_r(get_class_methods($conexao));

if($conexao->exec($sql)){
    $id = $conexao->lastInsertId();
    echo "Novo cadastro com id $id.";
}else{
    echo $conexao->errorCode(), "<br";
    print_r($conexao->errorInfo());
}