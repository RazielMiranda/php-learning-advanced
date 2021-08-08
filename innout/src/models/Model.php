<?php

class Model
{
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    public function __construct($arr)
    {
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr)
    {
        if ($arr) {
            foreach ($arr as $key => $value) {
                $this->set($key, $value);
            }
        }
    }

    public function set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function get($key)
    {
        return $this->values[$key];
    }
}
