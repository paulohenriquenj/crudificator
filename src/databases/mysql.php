<?php

namespace Crudificator\databases;

class mysql{

    public $conn;
    public $result;

    public function connect($config)
    {
        try {
            $this->conn = mysqli_connect($config['host'],  $config['userName'], $config['password'], $config['database']);
            return $this;
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
        $this->result = mysqli_query($this->conn, 'SHOW FULL COLUMNS FROM ' . $databaseName . '.' . $tableName);
        if($this->result) {
            return $this;
        }

        return false;
    }

    public function fetch_assoc()
    {
        while($row = mysqli_fetch_assoc($this->result)) {
            $linha[] = $row;
        }

        return $linha;
    }
}
