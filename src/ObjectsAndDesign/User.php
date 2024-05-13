<?php
namespace ObjectsAndDesign;
use DateTime;
class User implements UserInterface
{
    public function __construct(
        public string $firstName = '',
        public string $lastName = '',
        public ?DateTime $dob = NULL)
    {}
    public function getValues()
    {
        $vals = get_object_vars($this);
        $vals['dob'] = $this->dob->format('Y-m-d');
        return $vals;
    }
}
