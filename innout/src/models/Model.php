<?php

//Classe de model generica
class Model
{

    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    //Se passa os dados que deseja manipular
    public function __construct($arr)
    {
        $this->loadFromArray($arr);
    }

    //TODO: pesquisar o que é o set e o get pra entender essa função
    public function loadFromArray($arr)
    {
        if ($arr) {
            foreach ($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function __get($key)
    {
        return $this->values[$key];
    }

    public static function get($filters = [], $columns = '*')
    {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if ($result) {
            $class = get_called_class();
            while ($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    public static function getResultSetFromSelect($filters = [], $columns = '*')
    {
        $sql = "SELECT ${columns} FROM "
            . static::$tableName
            . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0){
            return null;
        }else{
            return $result;
        }
    }

    private static function getFilters($filters)
    {
        $sql = '';
        if(count($filters) > 0){
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormattedValue($value);
            }
        }
        return $sql;
    }

    private static function getFormattedValue($value)
    {
        if (is_null($value)) {
            return "null";
        }elseif(gettype($value) === 'string'){
            return "'${value}";
        }else{
            return $value;
        }
    }

}
