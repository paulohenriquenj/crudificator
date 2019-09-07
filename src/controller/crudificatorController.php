<?php

namespace Crudificator\controller;


class crudificatorController{

    public $databaseType;
    public $db;

    public function setDataBase($databaseType)
    {
        $this->databaseType = $databaseType;
    }


    public function createDatabasInstance()
    {
        $className = 'Crudificator\\databases\\' . $this->databaseType;
        $this->db = new $className;
    }


    public function getTableInfo($config)
    {
        $this->setDataBase($config['db_type']);

        $this->createDatabasInstance();

        $this->db->connect($config);

        $tableInfo = $this->db->getTableInfo($config['database'], $config['table']);

        return dd($tableInfo->fetch_assoc());
    }

}
