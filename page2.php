<h1> FORMS </H1><hr>

<?php
if(count($_POST) > 0){

    if (!filter_input(INPUT_POST, 'nome')) {
        echo 'Nome é obrigatorio','<br>';
    }

    if (filter_input(INPUT_POST, 'nascimento')) {
       //? Criar pelo formato que vai do value
       $data = DateTime::createFromFormat('Y-d-m', $_POST['nascimento']);
       if(!$data){
        echo "Data fora do padrão",'<br>';
       }
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'Fora do padrão','<br>';
    }

    if (!filter_var($_POST['site'], FILTER_VALIDATE_URL)) {
        echo 'URL fora do padrão','<br>';
    }

    $filhosConfig = [
        "options" => [
            "min_range" => 0, 
            "max_range" => 20,
        ],
    ];

    if(!filter_var($_POST['filhos'], FILTER_VALIDATE_INT, $filhosConfig) && $_POST['filhos'] != 0){
        echo 'Filhos fora do padrão','<br>';
    }

    $salarioConfig = [
        "options" => [
            'decimal' => ','
        ],
    ];

    if(!filter_var($_POST['salario'], FILTER_VALIDATE_FLOAT, $salarioConfig)){
        echo 'salario fora do padrão','<br>';
    }

}
?>

<form action="#" method="post">

    <label for="nome">Nome</label>
    <input value="<?=$_POST['nome']?>" type="text" name="nome" id="nome">

    <label for="nascimento">nascimento</label>
    <input value="<?=$_POST['nascimento']?>" type="date" name="nascimento" id="nascimento">

    <label for="filhos">filhos</label>
    <input value="<?=$_POST['filhos']?>" type="number" name="filhos" id="filhos">

    <label for="email">email</label>
    <input value="<?=$_POST['email']?>" type="email" name="email" id="email">

    <label for="site">site</label>
    <input value="<?=$_POST['site']?>" type="text" name="site" id="site">

    <label for="salario">salario</label>
    <input value="<?=$_POST['salario']?>" type="text" name="salario" id="salario">

    <input type="submit" value="submit" id="submit">

</form>
