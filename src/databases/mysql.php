<?php

namespace Crudificator\databases;

class mysql{

    public function connect($config)
    {
        try {
            $conn = mysqli_connect($config['host'],  $config['userName'], $config['password'], $config['database']);
            return $conn;
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
