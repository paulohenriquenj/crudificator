<?php

namespace Crudificator\controller;

use Crudificator\controller\formCreateController;


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

        return $tableInfo->fetch_assoc();
    }

    public function generateTable($tableInfo)
    {
        foreach($tableInfo as $field) {
            $table[] = [
                'field'   => $field['Field'],
                'type'    => $this->getFieldType($field),
                'size'    => $this->getFieldSize($field),
                'key'     => $field['Key'],
                'default' => $field['Default'],
                'extra'   => $field['Extra'],
            ];
        }

        return $table;
    }

    public function getFieldType($field)
    {
        if( strpos($field['Type'], '(') !== false ) {
            return explode('(', $field['Type'])[0];
        }

        return $field['Type'];
    }

    public function getFieldSize($field)
    {
        if( strpos($field['Type'], '(') !== false ) {
            preg_match('#\(([\d\,]+)\)#is', $field['Type'], $size);
            return $size[1];
        }

        return false;
    }

    public function createFormsTable($formConfig)
    {
        $fcc = new formCreateController($formConfig);

        $fcc->createForm();

    }

}
