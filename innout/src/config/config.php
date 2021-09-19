<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

// Constantes gerais
define('DAILY_TIME', 60 * 60 * 8);

// Pastas
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/templates'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('EXCPETION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));

// Arquivos importates
require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(realpath(dirname(__FILE__) . '/date_utils.php'));

//Objetivo dessa classe é guardar as regras de negocio "autoload"
require_once(MODEL_PATH . '/Model.php');
require_once(MODEL_PATH . '/User.php');
require_once(EXCPETION_PATH . '/AppException.php');
require_once(EXCPETION_PATH . '/ValidationException.php');