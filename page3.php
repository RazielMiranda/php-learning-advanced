<h1> EXCLUIR PDO</h1>
<hr>

<?php
require_once 'conexao.php';
$conexao = novaConexao();

$sql = "DELETE FROM cadastro where id = :id";
$stmt = $conexao->prepare($sql);
// $stmt->bindValue(':id', 30, PDO::PARAM_INT);
// if($stmt->execute([':id' => 1])){
if($stmt->execute([':id' => 1])){
    print_r($stmt->debugDumpParams());
}else{
    print_r($stmt->errorInfo());
}