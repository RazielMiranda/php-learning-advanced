<?php
namespace ObjectsAndDesign;
// connect to a database
use PDO;
class Connect
{
    const DB_FN = __DIR__ . '/../../data/users.db';
    public $pdo = NULL;
    public static $instance = NULL;
    private function __construct()
    {
        $this->pdo = new PDO('sqlite:' . self::DB_FN);
    }
    /**
     * Gets a Connect instance
     */
    public static function getInstance()
    {
        if (empty(self::$instance))
            self::$instance = new Connect();
        return self::$instance;
    }
    /**
     * Saves to the database
     * @param array : $data
     * @return bool
     */
    public function put(array $data) : bool
    {
        $sql = 'INSERT INTO users (first_name,last_name,dob) VALUES (:first_name,:last_name,:dob);';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($data));
    }
    /**
     * Reads the database
     * @return array
     */
    public function get() : array
    {
        $stmt = $this->pdo->query('SELECT * FROM users ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
