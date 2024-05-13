<?php
namespace ObjectsAndDesign;
/**
 * Takes data from database query and produces User instances
 */
use DateTime;
use Exception;
class UserFactory
{
    public const ERR_FIELDS = 'ERROR: invalid number of fields';
    /**
     * Expects a row from the database
     * @param array $data : database table row
     * @return User $user : User instance
     */
    public function __invoke(array $data): User
    {
        // validate fields
        $first = $data['first_name'] ?? '';
        $last  = $data['last_name'] ?? '';
        $dob   = new DateTime($data['dob'] ?? '');
        if (empty($first) || empty($last) || empty($dob)) {
            throw new Exception(self::ERR_FIELDS);
        }
        return new User($first, $last, $dob);
    }
}
