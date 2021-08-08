<?php

//O arquivo config tem a conexão com o banco e outras coisas importantes
require_once (dirname(__FILE__, 2)) . '/src/config/config.php';

//Incluindo classe
require_once (dirname(__FILE__, 2)) . '/src/models/User.php';

//Passando dados para a model User
$user = new User(['name' => 'Raziel', 'email' => 'razielx3@live.com']);

//Apenas chamando o objeto
var_dump($user);

//Usando metodo magico Set
$user->name = 'Raziel 2';

//Usando metodo magico get
var_dump($user->name);
