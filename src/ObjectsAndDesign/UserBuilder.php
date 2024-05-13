<?php
namespace ObjectsAndDesign;
/**
 * Example of the "builder" software design pattern
 */
use DateTime;
use Exception;
class UserBuilder
{
    public $user = NULL;
    public function __construct()
    {
        $this->user = new User();
    }
    public function setFirst(string $name)
    {
        $this->user->firstName = $name;
        return $this;
    }
    public function setLast(string $name)
    {
        $this->user->lastName = $name;
        return $this;
    }
    public function setDob(string $dob)
    {
        $this->user->dob = new DateTime($dob);
        return $this;
    }
    public function getUser()
    {
        return $this->user;
    }
}
