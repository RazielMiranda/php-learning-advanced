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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Curso PHP</title>
</head>
<body class="login">
    <header class="cabecalho">
        <h1>Curso PHP</h1>
        <h2>Seja Bem Vindo</h2>
    </header>
    <main class="principal">
        <div class="conteudo">
            <h3>Identifique-se</h3>
            <?php if ($_SESSION['erros']): ?>
                <div class="erros">
                    <?php foreach ($_SESSION['erros'] as $erro): ?>
                        <p><?= $erro ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <form action="#" method="post">
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha">
                </div>
                <button>Entrar</button>
            </form>
        </div>
    </main>
    <footer class="rodape">
        COD3R & ALUNOS © <?= date('Y'); ?>
    </footer>
</body>
</html>