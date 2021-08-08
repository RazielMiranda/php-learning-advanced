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
}
