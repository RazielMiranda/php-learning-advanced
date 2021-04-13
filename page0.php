<h1> TRY /CATCH </H1><hr>
<?php
// echo 7 /0 ;
// echo intdiv(7, 0);

try {
    echo intdiv(7,0);
} catch (\Throwable $th) {
    echo 'teve um erro aqui<hr>';
}

try {
    throw new Exception('um erro muito estranho<hr>');
    echo intdiv(7,0);
} catch (DivisionByZeroError $th) {
    echo 'dividindo por zero<hr>';
}catch (\Throwable $th) {
   echo 'erro em:' . $th->getMessage() .'...<hr>';
}finally{
    echo 'sempre executado<hr>';
}

echo 'execução continua<hr>';