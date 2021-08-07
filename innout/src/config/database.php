<?php

class Database
{
    public static function getConnection()
    {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini' );
    }
}
