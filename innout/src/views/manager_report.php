<main class="content">
<?php
    renderTitle(
        'Relatorio Gerencial',
        'Resumo das horas trabalhadas',
        'icofont-chart-histogram'
    );
?>
<div class="summary-boxes">

    <div class="summary-box bg-primary">
        <i class="icon icofont-users">
            <p class="title">Quantidade Funcionarios</p>
            <h3 class="value"><?=$activeUsersCount?></h3>
        </i>
    </div>
    <div class="summary-box bg-danger">
        <i class="icon icofont-patient-bed">
            <p class="title">Faltas</p>
            <h3 class="value"><?=count($absentUsers)?></h3>
        </i>
    </div>
    <div class="summary-box bg-success">
        <i class="icon icofont-sand-clock">
            <p class="title">Horas no mes</p>
            <h3 class="value"><?=$hoursInMonth?></h3>
        </i>
    </div>

</div>

<?php if(count($absentUsers) > 0): ?>
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title">Faltosos no dia</h4>
            <p class="card-category">Relação dos funcionarios que ainda nao bateram ponto</p>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Nome</th>
            </thead>
            <tbody>
                <?php foreach($absentUsers as $name): ?>
                    <tr>
                        <td><?=$name?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

</main>