<h1> EXCLUIR REGISTRO TABELA #01 </H1>
<hr>

<?php
require_once "conexao.php";

$sql = "DELETE FROM cadastro WHERE id = 1";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado){
    echo "Sucesso";
}else{
    echo "Erro" . $conexao->error;
}

$conexao->close();