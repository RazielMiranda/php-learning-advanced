<?php
// using the factory pattern
include __DIR__ . '/vendor/autoload.php';
use ObjectsAndDesign\{Connect, UserDecoratorJson};
try {
    $db = Connect::getInstance();
    foreach ($db->get() as $row) {
        echo (new UserDecoratorJson($row))->getValues();
        echo PHP_EOL;
    }
} catch (Throwable $t) {
    error_log(__FILE__ . ':' . $t->getMessage());
    $msg = 'ERROR: unable to connect to the database';
}

// actual output:
/*
{
    "firstName": "Wilma",
    "lastName": "Flintstone",
    "dob": "1970-02-02"
}
{
    "firstName": "Fred",
    "lastName": "Flintstone",
    "dob": "1970-01-01"
}
{
    "firstName": "Betty",
    "lastName": "Rubble",
    "dob": "1970-05-05"
}
{
    "firstName": "Barney",
    "lastName": "Rubble",
    "dob": "1970-04-04"
}
*/
