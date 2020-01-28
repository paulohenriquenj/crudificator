<?php

namespace Crudificator\controller;

use Crudificator\controller\formCreateController;


class crudificatorController{

    public $databaseType;
    public $db;
    public $fieldIcons;

    public function setDataBase($databaseType)
    {
        $this->databaseType = $databaseType;
    }


    public function createDatabaseInstance()
    {
        $className = 'Crudificator\\databases\\' . $this->databaseType;
        $this->db = new $className;
    }


    public function getTableInfo($config)
    {
        $this->setDataBase($config['db_type']);

        $this->createDatabaseInstance();

        $this->db->connect($config);

        $tableInfo = $this->db->getTableInfo($config['database'], $config['table']);

        return $tableInfo->fetch_assoc();
    }

    public function generateTable($tableInfo)
    {
        foreach($tableInfo as $field) {
            $table[] = [
                'field'    => $field['Field'],
                'type'     => $this->getFieldType($field),
                'type_raw' => $field['Type'],
                'size'     => $this->getFieldSize($field),
                'key'      => $field['Key'],
                'default'  => $field['Default'],
                'extra'    => $field['Extra'],
                'icons'    => $this->getFieldIcons($field),
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

    public function getFieldIcons($field)
    {
        if(empty($this->fieldIcons)) {
            $this->setFieldIcons();
        }

        return $this->fieldIcons[$field['Key']] ?? '';
    }

    public function setFieldIcons()
    {
        $this->fieldIcons = [
            'PRI' => '<i class="fa fa-fw fa-key key-pk" title="Primary Key"></i>',
            'MUL' => '<i class="fa fa-fw fa-key key-index" title="Índice (não único)"></i>',
            'UNI' => '<i class="fa fa-fw fa-key key-index" title="Índice (único)"></i>',
        ];

        return $this->fieldIcons;
    }

    public function createFormsTable($formConfig)
    {
        $fcc = new formCreateController($formConfig);

       echo $fcc->createForm();

    }

    public function writeRoutes($rota)
    {
        $routesFile = require __DIR__ . '/../html/partials/routes.php';

        $routesFile = str_replace('__rota__', trim($rota['nome'], '/'), $routesFile);

        echo '<hr ><pre class="highlight box-hl"><code>';
        
        echo $routesFile;

        echo '</code></pre>';
    }

}
