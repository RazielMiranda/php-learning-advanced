<?php

require_once (dirname(__FILE__, 2)) . '/src/config/config.php';
require_once (dirname(__FILE__, 2)) . '/src/models/User.php';
$user = new User(['name' => 'Raziel', 'email' => 'razielx3@live.com']);
var_dump($user);
