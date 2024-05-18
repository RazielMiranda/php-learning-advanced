<?php

namespace Creational;

class UserBuilder
{
    private int $id = 1;
    private string $firstName = 'Raziel Rodrigues';

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
        return array($this->id, $this->firstName);
    }
}
