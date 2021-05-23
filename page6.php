<h1> FORM UPDATE </H1><hr>

<?php
require_once 'conexao.php';
$conexao = novaConexao();




if(count($_POST) > 0){
    $dados = $_POST;
    $erros = [];
    
    if (trim($dados['nome']) === "") {
        echo 'Nome é obrigatorio','<br>';
    }

    if (isset($dados['nome'])) {
       //? Criar pelo formato que vai do value
       $data = DateTime::createFromFormat('Y-d-m', $dados['nascimento']);
       if(!$data){
        echo "Data fora do padrão",'<br>';
       }
    }

    if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'Fora do padrão','<br>';
    }

    if (!filter_var($dados['site'], FILTER_VALIDATE_URL)) {
        echo 'URL fora do padrão','<br>';
    }

    $filhosConfig = [
        "options" => [
            "min_range" => 0, 
            "max_range" => 20,
        ],
    ];

    if(!filter_var($dados['filhos'], FILTER_VALIDATE_INT, $filhosConfig) && $dados['filhos'] != 0){
        echo 'Filhos fora do padrão','<br>';
    }

    $salarioConfig = [
        "options" => [
            'decimal' => ','
        ],
    ];

    if(!filter_var($dados['salario'], FILTER_VALIDATE_FLOAT, $salarioConfig)){
        echo 'salario fora do padrão','<br>';
    }

    if(!count($erros)){

        $sql = "INSERT INTO cadastro
        (nome, nascimento, email, site, filhos, salario)
        VALUES (? , ? , ? , ? , ? , ?);";

        $stmt = $conexao->prepare($sql);

        $params = [
            $dados['nome'],
            $data ? $data->format('Y-m-d') : null,
            $dados['email'],
            $dados['site'],
            $dados['filhos'],
            $dados['salario'],
        ];

        $stmt->bind_param("ssssid", ...$params);
    }

    if($stmt->execute()){
        unset($dados);
    }

}
?>

<form action="#" method="post">

    <label for="nome">Nome</label>
    <input value="" type="text" name="nome" id="nome">

    <label for="nascimento">nascimento</label>
    <input value="" type="date" name="nascimento" id="nascimento">

    <label for="filhos">filhos</label>
    <input value="" type="number" name="filhos" id="filhos">

    <label for="email">email</label>
    <input value="" type="email" name="email" id="email">

    <label for="site">site</label>
    <input value="" type="text" name="site" id="site">

    <label for="salario">salario</label>
    <input value="" type="text" name="salario" id="salario">

    <input type="submit" value="submit" id="submit">

</form>
