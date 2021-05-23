<h1> EXCLUIR REGISTRO TABELA #02 </H1>
<hr>
<?php
require_once 'conexao.php';
$conexao = novaConexao();

//? Faz a exclusao antes do select para ja atualizar para a versão mais nova
//? Verifica se o parametro excluir esta setado dessa forma pega o id dele e executa o sql de delete
if($_GET['excluir']){

    //! Utilizando bind parameters no SQL
    $excluirSQL = "DELETE FROM cadastro WHERE id = ?";

    //! Preparando o SQL para nao ter SQL INJECTION
    //? EXEMPLO: ?excluir=1;delete from users;
    $stmt = $conexao->prepare($excluirSQL);

    //! Usando a função de verificação do SQL
    //! Passando o tipo do parametro que espera e ai sim o valor do ID vindo do GET
    $stmt->bind_param('i', $_GET['excluir']);

    //! Executando o SQL
    $stmt->execute();
}

//! Apenas criando tabela de dados
$sql = "SELECT * FROM cadastro;";
$registros = [];
$resultado = $conexao->query($sql);
if($resultado->num_rows > 0){
    while($row = $resultado->fetch_assoc()){
        $registros[] = $row;
    }
}else if($conexao->error){
    die("Error: " . $conexao->error);
}
$conexao->close();
// var_dump($registros);

?>
<style>
    * {
        text-align: left;
    }
    table{
        border: black solid 2px;
    }
    td{
        border: black solid 2px;
    }
    th{
        border: black solid 2px;
    }
</style>
<table>
    <thead>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>NASCIMENTO</th>
        <th>AÇÕES</th>
    </thead>
    <tbody>
    <?php foreach($registros as $registro): ?>
        <tr>
            <td><?=$registro['nome']?></td>
            <td><?=$registro['email']?></td>
            <td><?=$registro['nascimento']?></td>
            <td>
            <button>
            <!-- passando flag de exclusão no botão da tabela -->
                <a href="?excluir=<?=$registro['id']?>">DELETAR</a>
            </button>
            <button>
                <a href="?id=<?=$registro['id']?>">UPDATE</a>
            </button>            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
