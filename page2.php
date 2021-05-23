<h1> CONSULTAR PDO</h1>
<hr>
<?php
require_once 'conexao.php';
$conexao = novaConexao();

/*
! SQL para trazer todos os dados

    ? FETCH_NUM = Array numerico de dados
    ? FETCH_CLASS = Transforma cada resultado em uma classe statica
    ? FETCH_BOTH = Traz associativo e numerico
    ? FETCH_ASSOC = Array associativo de dados

    Se usa o metodo fetchAll para buscar os dados isso indica que vai retornar todos
    os dados da tabela ou seja vai sincronizar todos os dados.
    o metodo de execução foi o query, pois nao possui bindParameters esse SQL

*/
$sql = "SELECT * FROM cadastro";
$resultado = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
print_r($resultado);

/*

! SQL para paginação de dados onde:

    ? LIMIT = Quantidade de dados que quer buscar no banco
    ? OFFSET = A partir de qual dado quer fazer isso ou seja o intervalo de busca de 10 em 10 etc...

*/
$sql = "SELECT * FROM cadastro LIMIT :qtde OFFSET :inicio";

//? Aqui se usa bindParameters, primeiro usamos o prepare no SQL
$stmt = $conexao->prepare($sql);

//? Em seguida setamos cada parametro do SQL usando o metodo bindValue
//? É passado primeiro o nome do parametro no SQL, em seguida o VALOR DELE, e por ultimo o tipo do parametro
//? É uma boa pratica especificar o tipo do parametro
$limit = 10;
$offset = 2;
$stmt->bindValue(':qtde', $limit, PDO::PARAM_INT);
$stmt->bindValue(':inicio', $offset, PDO::PARAM_INT);

//? Aqui tambem se usa o fetchAll
if ($stmt->execute()) {
    $resultado = $stmt->fetchAll();
    var_dump($resultado);
} else {
    echo "Codigo erro: " . $stmt->errorCode();
    var_dump($stmt->errorInfo());
}

//? Descobrindo metodos de uma classe ou de uma instancia de classe
// var_dump(get_class_methods($stmt));
// var_dump(get_class_methods($conexao));


/*

! SQL para unico resultado

    ? opcao 1 = $sql = "SELECT * FROM cadastro WHERE id = ?";
    ? opcao 2 = $sql = "SELECT * FROM cadastro WHERE id = :id";

    ! $stmt->bindValue(':id', 30, PDO::PARAM_INT);
    ! if($stmt->execute())
    ! if($stmt->execute([30]))

*/

$sql = "SELECT * FROM cadastro WHERE id = :id";
$stmt = $conexao->prepare($sql);

if ($stmt->execute([':id' => 30])) {
    $resultado = $stmt->fetch();
    var_dump($resultado);
} else {
    echo "Codigo erro: " . $stmt->errorCode();
    var_dump($stmt->errorInfo());
}
