<main class="content">
    <?php
        renderTitle(
            'Cadastro de usuarios',
            'Crie e atualize usuarios',
            'icofont-user'
        );
        include(TEMPLATE_PATH . "/messages.php");
    ?>

    <form action="#" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="Digite o nome"
                    class="form-control <?=$errors[''] ? 'is-invalid' : '' ?> 
                    value=<?=$name?>
                    ">
                    <div class="invalid-feedback">
                        <?=$errors[''] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite o e-mail"
                    class="form-control <?=$errors[''] ? 'is-invalid' : '' ?> 
                    value=<?=$email?>
                    ">
                    <div class="invalid-feedback">
                        <?=$errors[''] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" placeholder="Digite a senha"
                    class="form-control <?=$errors[''] ? 'is-invalid' : '' ?> 
                                       ">
                    <div class="invalid-feedback">
                        <?=$errors[''] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="confirm_password">Confirmar senha</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Digite a senha novamente"
                    class="form-control <?=$errors[''] ? 'is-invalid' : '' ?> 
                                       ">
                    <div class="invalid-feedback">
                        <?=$errors[''] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Data de inicio</label>
                <input type="date" name="start_date" id="start_date" placeholder="Digite a data de inicio"
                    class="form-control <?=$errors[''] ? 'is-invalid' : '' ?> 
                    value="value=<?=$start_date?>"
                    ">
                    <div class="invalid-feedback">
                        <?=$errors[''] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="end_date">Data de saida</label>
                <input type="date" name="end_date" id="end_date" placeholder="Digite a data de saida"
                    class="form-control <?=$errors[''] ? 'is-invalid' : '' ?> 
                    value=<?=$end_date?>
                    ">
                    <div class="invalid-feedback">
                        <?=$errors[''] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="is_admin">Administrador?</label>
                <input type="checkbox" name="is_admin" id="is_admin"
                    class="form-control <?=$errors[''] ? 'is-invalid' : '' ?> 
                    <?= $is_admin ? 'checked' : '' ?>
                    ">
                    <div class="invalid-feedback">
                        <?=$errors[''] ?>
                    </div>
            </div>
        </div>
        
        <button class="btn btn-primary btn-lg">
            Salvar
        </button>
        <a class="btn btn-lg btn-secondary" href="/users.php">Cancelar</a>
    </form>

</main>