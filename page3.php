<h1> INSERIR REGISTRO TABELA #01 </H1>
<hr>

<?php
require_once "conexao.php";

$sql = "INSERT INTO cadastro
(nome, nascimento, email, site, filhos, salario)
VALUES(
    'Rosana',
    '1987-12-23',
    'raziel@email.com',
    'https://www.google.com',
    2,
    1700.98
)";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado){
    echo "Sucesso";
}else{
    echo "Erro" . $conexao->error;
}

$conexao->close();