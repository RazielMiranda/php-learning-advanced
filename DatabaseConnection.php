<?php

//TODO: IMPROVE ERRORS TREATMENT
//TODO: CREATE AN INTERFACE
//TODO: CREATE ANOTHER CLASS TO RENDERIZE A VIEW WITH DATA USING HANDLEBARS.JS
class DatabaseCRUD
{
    static public $server;
    static public $database;
    static public $user;
    static public $pass;

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

    static public function create(string $table, array $parameters): bool
    {
        $is_inserted = false;
        $connection = self::connect();

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

    static public function readAll(string $table): array
    {
        $data = [];
        $connection = self::connect();

        $sql = "SELECT * FROM {$table};";
        $data = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $connection = null;
        return $data;
    }

    static public function readOne(string $table, int $id): array
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

    static public function readPagination(string $table, int $howMuchData, int $fromLine): array
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

    static public function update(string $table, array $parameters, int $id): bool
    {
        $is_updated = false;
        $connection = self::connect();
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

    static public function sampleMigration(): bool
    {
        $is_migrated = false;
        $connection = self::connect();

        $sql = 'CREATE DATABASE sample_db; USE sample_db; 
        CREATE TABLE sample_table (id INTEGER(9) AUTO_INCREMENT PRIMARY KEY,  info VARCHAR2(120));
        INSERT INTO sample_table(DEFAULT, time());
        INSERT INTO sample_table(DEFAULT, time());';

        $is_migrated = $connection->query($sql);
        print_r([
            'query' => $sql,
            'result' => $is_migrated
        ]);
        return $is_migrated;
    }

}

const ID = 1;
const MAX_RESULTS = 2;
const FROM_RESULTS = 0;
const TABLE = 'cadastro';
const SAMPLE_DATA = [
    'nome' => 'Teste',
    'nascimento' => '1999-01-01',
    'email' => 'site@gmail.com',
    'site' => 'http://site.com',
    'filhos' => 0,
    'salario' => 1250,
];

//TODO: GET FROM .ENV
DatabaseCRUD::$server = '127.0.0.1:3306';
DatabaseCRUD::$database = 'curso_php';
DatabaseCRUD::$user = 'root';
DatabaseCRUD::$pass = '';

// var_dump(DatabaseCRUD::create(TABLE, SAMPLE_DATA));
// var_dump(DatabaseCRUD::readAll(TABLE));
// var_dump(DatabaseCRUD::readOne(TABLE, ID));
// var_dump(DatabaseCRUD::readPagination(TABLE, MAX_RESULTS, FROM_RESULTS));
// var_dump(DatabaseCRUD::update(TABLE, SAMPLE_DATA, ID));
// var_dump(DatabaseCRUD::delete(TABLE, ID));