# FORMS

- criar forms com o html
- colocando # no action manda para a propria pagina (default)


### filter_input

- valida se existe o valor dentro do array $_POST

- INPUT_POST flag para qual tipo de input quer fitrar

- nascimento nome do indie da variavel em _POST

- validando data:

        if (filter_input(INPUT_POST, 'nascimento')) {
            //? Criar pelo formato que vai do value
            $data = DateTime::createFromFormat('Y-d-m', $_POST['nascimento']);
            if(!$data){
                echo "Data fora do padrão",'<br>';
            }
        }

### filter_var

- voce consegue filtrar o que tem dentro da variavel e 
- aplicar uma mascara de validação como o terceiro parametro

        //? Criando configuração de validação do input, baseado no TIPO dele
        $filhosConfig = [
            "options" => [
                "min_range" => 0, 
                "max_range" => 20,
            ],
        ];

        //? VALIDANDO O VALOR DA VARIAVEL, VENDO SE É INT E DEPOIS APLICANDO A MASCARA
        if(!filter_var($_POST['filhos'], FILTER_VALIDATE_INT, $filhosConfig) && $_POST['filhos'] != 0){
            echo 'Filhos fora do padrão','<br>';
        }