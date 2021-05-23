<h1> CRIAR CONEXÃO MYSQL PDO </h1>
<hr>

//? Ideal é passar isso para um arrquivo a parte
//? Setando o banco como parametro para caso queira mude depois
//? Criando um objeto mysqli para depois criar uma conexão com o banco, estando em uma função fica dinamico.
function novaConexao($banco = 'curso_php')
{
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = '';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    //? Ideal é usar uma checagem de erro menos bruta: levar usar para uma pagina de suporte
    if ($conexao->connect_error) {
        die('Erro: ' . $conexao->connect_error);
    }

    return $conexao;
}
