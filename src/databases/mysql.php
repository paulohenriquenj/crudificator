<?php

namespace Crudificator\databases;

class mysql{

    public function connect($config)
    {
        try {
            $pdo = new PDO($this->parseConfig($config), $config['userName'], $config['password']);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Can not connect to database.';
        }
    }

    public function parseConfig(array $config)
    {
        return 'mysql:' . $config['host'] . ';dbname='.$config['database'];
    }


    public function getTableInfo($databaseName, $tableName)
    {
        
    }
}
