<?php
// using the builder pattern
include __DIR__ . '/vendor/autoload.php';
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
Array
(
    [0] => ObjectsAndDesign\User Object
        (
            [firstName] => Wilma
            [lastName] => Flintstone
            [dob] => DateTime Object
                (
                    [date] => 1970-02-02 00:00:00.000000
                    [timezone_type] => 3
                    [timezone] => UTC
                )

        )

    [1] => ObjectsAndDesign\User Object
        (
            [firstName] => Fred
            [lastName] => Flintstone
            [dob] => DateTime Object
                (
                    [date] => 1970-01-01 00:00:00.000000
                    [timezone_type] => 3
                    [timezone] => UTC
                )

        )

    [2] => ObjectsAndDesign\User Object
        (
            [firstName] => Betty
            [lastName] => Rubble
            [dob] => DateTime Object
                (
                    [date] => 1970-05-05 00:00:00.000000
                    [timezone_type] => 3
                    [timezone] => UTC
                )

        )

    [3] => ObjectsAndDesign\User Object
        (
            [firstName] => Barney
            [lastName] => Rubble
            [dob] => DateTime Object
                (
                    [date] => 1970-04-04 00:00:00.000000
                    [timezone_type] => 3
                    [timezone] => UTC
                )

        )

)
*/
