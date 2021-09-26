<main class="content">
<?php
    renderTitle(
        'Relatorio Mensal',
        'Acompanhe seu saldo de horas',
        'icofont-ui-calendar'
    );
?>
<div>

    <form class="mb-4" action="#" method="post">
        <div class="input-group">
            <select name="user" class="form-control ml-1" placeholder="Selecione o usuario...">
                <option value="">Selecione o usuario</option>
                <?php
                    foreach ($users as $user) {
                        echo "<option value='{$user->id}'>{$user->name}</option>";
                    }
                ?>
            </select>
            <select name="period" class="form-control ml-2" placeholder="Selecione o periodo...">
                <option value="">Selecione o periodo</option>
                <?php
                    foreach ($periods as $key => $month) {
                        $selected = $key === $selectedPeriod ? 'selected' : '';
                        echo "<option value='{$key}'>{$month}</option>";
                    }
                ?>
            </select>
            <button class="btn btn-primary">
                <i class="icofont-search"></i>
            </button>
        </div>
    </form>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Dia</th>
            <th>Entrada 1</th>
            <th>Saida 1</th>
            <th>Entrada 2</th>
            <th>Saida 2</th>
            <th>Saldo</th>
        </thead>
        <tbody>
        <?php foreach($report as $registry): ?>
            <tr>    
                <td><?= formatDateWithLocale($registry->work_date, '%A, %d de %B de %Y') ?></td>
                <td><?= $registry->time1 ?></td>
                <td><?= $registry->time2 ?></td>
                <td><?= $registry->time3 ?></td>
                <td><?= $registry->time4 ?></td>
                <td><?= $registry->getBalance() ?></td>
            </tr>
        <?php endforeach; ?>
            <tr class="bg-primary text-white">    
                <td>Horas Trabalhadas</td>
                <td colspan="3"><?= $sumOfWorkedTime ?></td>
                <td colspan="1">Saldo Mensal</td>
                <td><?= $balance ?></td>
            </tr>
        </tbody>
    </table>
</div>
</main>