<form class="form-login" method="post">
    <div class="card login-card">
        <div class="card-header">
            <i class="icofont-travelling"></i>
            <span class="font-weight-light ml-2">In </span>
            <span class="font-weight-bold mx-2">N' </span>
            <span class="font-weight-light mr-2">Out </span>
            <i class="icofont-runner-alt-1"></i>
        </div>
        <div class="card-body">

            <?php include(TEMPLATE_PATH . '/messages.php'); ?>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input value="<?= ($email ?? '') ?>" type="email" name="email" id="email" class="form-control <?= (!empty($errors['email'])) ? 'is-invalid' : ''  ?> " placeholder="Informe o e-mail" autofocus>
                <div class="invalid-feedback">
                    <?= ($errors['email'] ?? '') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control <?= (!empty($errors['password'])) ? 'is-invalid' : ''  ?> " "
                        placeholder=" Informe a senha">
                <div class="invalid-feedback">
                    <?= ($errors['password'] ?? '') ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-lg btn-primary">Entrar</button>
        </div>
    </div>
</form>

<?= ($texto ?? '') ?>