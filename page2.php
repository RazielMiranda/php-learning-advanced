<h1> CONSULTAR PDO</h1>
<hr>

<?php
require_once 'conexao.php';
$conexao = novaConexao();

$sql = "SELECT * FROM cadastro";
//? FETCH_NUM , FETCH_CLASS, FETCH_BOTH, FETCH_ASSOC
$resultado = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// var_dump($resultado);

$sql = "SELECT * FROM cadastro LIMIT :qtde OFFSET :inicio";


//? Esse numero precisa ser passado como inteiro
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':qtde', 2 , PDO::PARAM_INT);
$stmt->bindValue(':inicio', 3 , PDO::PARAM_INT);

if($stmt->execute()){
    $resultado = $stmt->fetchAll();
    var_dump($resultado);
}
// var_dump(get_class_methods($stmt));

//? Unico resultado
// $sql = "SELECT * FROM cadastro WHERE id = ?";
$sql = "SELECT * FROM cadastro WHERE id = :id";
$stmt = $conexao->prepare($sql);
// $stmt->bindValue(':id', 30, PDO::PARAM_INT);
// if($stmt->execute())
// if($stmt->execute([30]))

if($stmt->execute([':id' => 30])){
    $resultado = $stmt->fetch();
    var_dump($resultado);
}else{
    echo "Codigo erro: " . $stmt->errorCode();
    var_dump($stmt->errorInfo());
}