<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

// Pastas
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));

// Arquivos importates
require_once(realpath(dirname(__FILE__) . '/database.php'));

//Objetivo dessa classe é guardar as regras de negocio
require_once(MODEL_PATH . '/Model.php');