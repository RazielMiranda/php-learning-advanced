<?php
namespace ObjectsAndDesign;
// provides a decorator for User that produces values in JSON format
use DateTime;
class UserDecoratorJson implements UserInterface
{
    protected ?UserInterface $user = NULL;
    public function __construct(array $row)
    {
        [$id, $firstName, $lastName, $dob] = array_values($row);
        $this->user = new User($firstName, $lastName, new DateTime($dob));
    }
    public function getValues()
    {
        return json_encode($this->user->getValues(), JSON_PRETTY_PRINT);
    }
}
