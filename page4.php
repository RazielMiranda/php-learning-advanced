<h1> SELECIONAR REGISTRO TABELA #01 </H1>
<hr>

<?php
require_once "conexao.php";

$sql = "SELECT * FROM cadastro;";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

//? Nos outros casos era apenas inserção e criação ou seja o resultado era true ou false

//? Array para guardar os dados
$registros = [];

//? Selecionando os dados da tabela e verificando se é maior que 0 se for vai rodar um while
if($resultado->num_rows > 0){
    //? Nesse while vai pegar cada linha da tabela do banco de dados e transformar em um
    //? array associativo: chave e valor
    //? pode usar fetch array
    while($row = $resultado->fetch_assoc()){
        $registros[] = $row;
    }
}else if($conexao->error){
    echo "Erro" . $conexao->error;
}

// var_dump($registros);

$conexao->close();

?>

<table>
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Email</th>
    </thead>
    <tbody>
        <?php foreach($registros as $registro): ?>
            <tr>
                <td><?=$registro['id']?></td>
                <td><?=$registro['nome']?></td>
                <td><?=$registro['nascimento']?></td>
                <td><?=$registro['email']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>