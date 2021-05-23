<h1> UPDATE PDO</h1>
<hr>

<?php
require_once 'conexao.php';
$conexao = novaConexao();

$sql = "UPDATE cadastro
SET nome = ? , nascimento = ? , email = ?, site = ?, filhos = ?, salario = ?
WHERE id = ?;";

$stmt = $conexao->prepare($sql);
$resultado = $stmt->execute([
    'Gui',
    '1999-01-01',
    'gui@gui.com.br',
    'https://www.google.com',
    1,
    1293,
    25
]);

if($resultado){
    echo "Alterado";
}else{
    print_r($stmt->errorInfo());
}