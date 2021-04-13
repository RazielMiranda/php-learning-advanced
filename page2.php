<h1> Error Handler </H1><hr>
<?php
ini_set('display_errors', 1);
echo 4 / 0;

error_reporting(E_ERROR);
error_reporting(E_ALL);
error_reporting(~E_ALL);

error_reporting(E_ALL);
echo 4 / 0;
include 'ARQUI';

function filtrar($errno, $errstring){
    $text = 'include';
    return !!stripos("$errstring", $text);
}
set_error_handler('filtrarMensagem', E_WARNING);

echo 4 / 0;
include 'ARQUI';

restore_error_handler();