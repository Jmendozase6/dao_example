<?php
include_once 'config.php';

class Connection
{
    public static function connect()
    {
        return new PDO(
            DRIVER . ':host=' . HOST . ';dbname=' . BASE . ';port=' . PORT,
            USER,
            PASS
        );
    }
}
