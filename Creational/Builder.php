<?php

namespace Creational;

class UserBuilder
{
    private int $id;
    private string $firstName;


    public function setId(int $id): UserBuilder
    {
        $this->id = $id;
        return $this;
    }


    public function setFirstName(string $firstName): UserBuilder
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function build(): array
    {
        return array(
            'id' => $this->id,
            'first_name' => $this->firstName
        );
    }
}

# $user = new UserBuilder;
# $user->setId(1);
# $user->setFirstName('Raziel Rodrigues');
# print_r($user->build());