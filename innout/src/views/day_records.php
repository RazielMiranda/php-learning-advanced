<main class="content">
    <?php
        renderTitle(
            'Registrar ponto', 
            'Mantenha deu ponto consistente', 
            'icofont-check-alt'
        );
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="card">

        <div class="card-header">
            <h3><?=$today?></h3>
            <p class="mb-0">Os batimentos efetuados hoje</p>
        </div>

        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 1: <?=($workingHours->time1 ?? '----')?></span>
                <span class="record">Saida 1:  <?=($workingHours->time2 ?? '----')?></span>
            </div>
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 2:  <?=($workingHours->time3 ?? '----')?></span>
                <span class="record">Saida 2:  <?=($workingHours->time4 ?? '----')?></span>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-center">
            <a href="innout.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Bater o ponto
            </a>
        </div>

    </div>

    <form class="mt-5" action="innout.php" method="post">
        <div class="input-group no-border">
            <input placeholder="informe a hora para simular o batimento" 
            class="form-control" type="text" name="forcedTime">
            <button class="btn btn-danger ml-3">
                Simular ponto
            </button>
        </div>
    </form>

</main>