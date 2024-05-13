<?php
// using the factory pattern
include __DIR__ . '/vendor/autoload.php';
use ObjectsAndDesign\{Connect, UserFactory};
try {
    $db      = Connect::getInstance();
    $factory = new UserFactory();
    $list    = [];
    foreach ($db->get() as $row) {
        $list[] = $factory($row);
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
                    [date] => 1999-12-02 00:00:00.000000
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
                    [date] => 1999-12-01 00:00:00.000000
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
                    [date] => 1999-12-05 00:00:00.000000
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
                    [date] => 1999-12-04 00:00:00.000000
                    [timezone_type] => 3
                    [timezone] => UTC
                )

        )

)
*/
