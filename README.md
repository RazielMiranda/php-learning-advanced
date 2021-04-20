# Sessão e Cookies

#### Sessão

    - antes de começar a usar sessão é necessario usar o metodo session_start
        - inicializa
        - permite usar
    - a sessão é um array
    - para destruir uma sessão se usa session_destroy()

    - como gerenciar sessão
    - cada sessão tem um ID
    - é importante regenerar esse id sempre
    para nao haver duplicata de dados no webserver
    
    - a logica de login deve ser implementada logo no inicio do software
        - 1 regra: redirect para a home caso nao esteja logado: header() com if na sessao usuario
        - 2 regra: disponibilizar um form de login
        - 3 regra: fazer uma checagem em um banco de dados ou "array" se existe os dados de usuario do form
            - pode checar a variavel post mesmo
        - 4 regra: criptografar senhas


#### Cookies

    - um cookie fica salvo no browser
    - ele nao se perde quando fecha o browser
    - o cookie serve para guardar estados/informações do usuario
    - de forma que seja possivel rastrear comportamentos do usuario
    
    - um cookie tem uma data de validade

#### CODE:

<?php 
session_start();

//! Para limpar um cookie
// unset($_COOKIE['usuario']);
// setcookie('usuario', '');

//! verificando se esta no cookie porque caso esteja so setar a sessão com esse valor
if($_COOKIE['usuario']){
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

//! verificando se usaurio esta na sessão se nao estiver redireciona
if(!$_SESSION['usuario']){
    // header('Location: page1.php');
}

//! coletando dados form
$email = $_POST['email'];
$senha = $_POST['senha'];

// verificando se o dado doe mail consta no array
if($_POST['email']) {
    $usuarios = [
        [
            "nome" => "Aluno Cod3r",
            "email" => "aluno@cod3r.com.br",
            "senha" => "1234567",
        ],
        [
            "nome" => "Outro Aluno",
            "email" => "outro@email.com.br",
            "senha" => "7654321",
        ],
    ];

    foreach($usuarios as $usuario) {
        $emailValido = $email === $usuario['email'];
        $senhaValida = $senha === $usuario['senha'];

        //! caso seja valido seta dentro da sessão e cria o coookie
        if($emailValido && $senhaValida) {
            $_SESSION['erros'] = null;
            $_SESSION['usuario'] = $usuario['nome'];
            //! Definindo tempo de expiração do cookie ou seja quanto tempo vai estar ativo o cookie do usuario no sistema
            $exp = time() + 60 * 60 * 24 * 30;
            //! Setando o cookies
            //? 1 nome do usaurio, o que quer salvar, tempo de expiração
            setcookie('usuario', $usuario['nome'], $exp);
            header('Location: page2.php');
        }
    }

    if(!$_SESSION['usuario']) {
        $_SESSION['erros'] = ['Usuário/Senha inválido!'];
    }
}
?>