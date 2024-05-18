<?php

namespace Creational;

include_once 'UserBuilder.php';

use Creational\UserBuilder;

class UserFactory
{

    public function __construct($id, $firstName)
    {
        # other stuff happens

        $builder = new UserBuilder();
        $builder->setId($id);
        $builder->setFirstName($firstName);

        return $builder->build();
    }
}

$x = new UserFactory('123', 'John');
var_dump($x);
