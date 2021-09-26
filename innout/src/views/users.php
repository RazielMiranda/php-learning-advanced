<main class="content">
    <?php
        renderTitle(
            'Cadastro de usuarios',
            'Mantenha os dados dos usuarios atualizados',
            'icofont-users'
        );
        include(TEMPLATE_PATH . "/messages.php");
    ?>

    <a class="btn btn-lg btn-primary mb-3" href="save_user.php">
        Novo usuario
    </a>

    <table class="table table-striped table-hover">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de admissao</th>
            <th>Data de desligamento</th>
            <th>Açoes</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?=$user->name?></td>
                    <td><?=$user->email?></td>
                    <td><?=$user->start_date?></td>
                    <td><?=$user->end_date?></td>
                    <td>
                        <a class="btn btn-warning rounded-circle mr-2" 
                        href="save_user.php?update=<?=$user->id?>">
                            <i class="icofont-edit"></i>
                        </a>
                        <a class="btn btn-warning rounded-circle" 
                        href="?delete=<?=$user->id?>">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>