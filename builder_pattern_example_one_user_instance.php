<?php
// using the builder pattern
include __DIR__ . '/ObjectsAndDesign/Autoload.php';
$autoload = new \ObjectsAndDesign\Autoload(__DIR__);
use ObjectsAndDesign\{Connect, UserBuilder};
try {
    $db = Connect::getInstance();
    $list = [];
    foreach ($db->get() as $row) {
        $builder = new UserBuilder();
        $list[] = $builder->setFirst($row['first_name'])
                          ->setLast($row['last_name'])
                          ->setDob($row['dob'])
                          ->getUser();
    }
    print_r($list);
} catch (Throwable $t) {
    error_log(__FILE__ . ':' . $t->getMessage());
    $msg = 'ERROR: unable to connect to the database';
}

// actual output:
/*
*/
