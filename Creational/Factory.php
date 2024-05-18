<?php

namespace Creational;

include_once 'Builder.php';

use Creational\UserBuilder;

# echo PHP_EOL;
# echo '== Factory & Builder ==';
# echo PHP_EOL;

class UserFactory
{

    public function __construct(
        private int $id,
        private string $firstName
    ) {
    }

    public function get(): UserBuilder
    {
        return (new UserBuilder())
            ->setId($this->id)
            ->setFirstName($this->firstName);
    }
}

for ($i = 1; $i < 10; $i++) {
    $user = new UserFactory($i, 'Raziel Rodrigues');;
    # print_r($user->get($i)->build());
}
