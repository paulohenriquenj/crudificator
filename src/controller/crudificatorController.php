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

}
