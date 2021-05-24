<?php

class DatabaseConnection
{
    static public $server = '127.0.0.1:3306';
    static public $database = 'curso_php';
    static public $user = 'root';
    static public $pass = '';

    static private function connect(): object
    {
        $connection = null;
        try {
            $connection = new PDO(
                "mysql:host=" . self::$server . "; dbname=" . self::$database . "",
                self::$user,
                self::$pass
            );
            return $connection;
        } catch (PDOException $e) {
            die("Error in database connection: " . $e->getMessage());
        }
    }

    static public function selectAll(string $table): array
    {
        $data = [];
        $connection = self::connect();
        $sql = "SELECT * FROM {$table};";
        $data = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $connection = null;
        return $data;
    }

    static public function selectOne(string $table, int $id): array
    {
        $data = [];
        $connection = self::connect();
        $sql = "SELECT * FROM {$table} WHERE id = :id;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $data[] = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $connection = null;
        return $data;
    }

    static public function selectPagination(string $table, int $howMuchData, int $fromLine): array
    {
        $data = [];

        $connection = self::connect();
        $sql = "SELECT * FROM {$table} LIMIT :howMuchData OFFSET :fromLine;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':howMuchData', $howMuchData, PDO::PARAM_INT);
        $stmt->bindValue(':fromLine', $fromLine, PDO::PARAM_INT);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $data[] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $connection = null;
        return $data;
    }

    static public function insert(string $table, array $parameters): bool
    {
        $connection = self::connect();
        $is_inserted = false;

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $stmt = $connection->prepare($sql);
        $is_inserted = $stmt->execute($parameters);

        $connection = null;
        return $is_inserted;
    }

    static public function update(string $table, array $parameters, int $id): bool
    {
        $connection = self::connect();
        $is_updated = false;
        $parametersKeys = array_keys($parameters);

        foreach ($parametersKeys as $field) $fieldsToUpdate[] = $field . ' = ' . ':' . $field;

        $sql = sprintf(
            'UPDATE %s SET %s WHERE (id = %d)',
            $table,
            implode(', ', array_values($fieldsToUpdate)),
            $id
        );

        $stmt = $connection->prepare($sql);
        $is_updated = $stmt->execute($parameters);
        $connection = null;
        return $is_updated;
    }

    static public function delete(string $table, int $id): bool
    {
        $is_deleted = false;
        $connection = self::connect();
        $sql = "DELETE FROM {$table} WHERE id = :id;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $is_deleted = $stmt->execute();
        $connection = null;
        return $is_deleted;
    }
}

// var_dump(DatabaseConnection::selectAll('cadastro'));
// var_dump(DatabaseConnection::selectOne('cadastro', 1));
// var_dump(DatabaseConnection::selectPagination('cadastro', 10, 1));
// $data = [
//     'nome' => 'Teste atualizado novamente',
//     'nascimento' => '1999-01-01',
//     'email' => 'site@gmail.com',
//     'site' => 'http://site.com',
//     'filhos' => 0,
//     'salario' => 1250,
// ];
// var_dump(DatabaseConnection::update('cadastro', $data, 37));
// var_dump(DatabaseConnection::delete('cadastro', 25));