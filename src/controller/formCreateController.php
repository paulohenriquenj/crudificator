<?php

namespace Crudificator\controller;

class formCreateController
{
    public $requiredFields=[];

    public function __construct($config) {
        $this->config = $config;
        $this->setRequiredFields();
    }

    public function createForm()
    {
        array_walk(
            $this->config,
            [$this, 'createFormElement']
        );
    }

    private function createFormElement($fieldInfo)
    {
        if ($this->haveAllRequiredFields($fieldInfo) ) {
            
            dd($fieldInfo);

            return true;
        }

        abort('Missin required info.');
    }

    public function haveAllRequiredFields($configToTest)
    {
        foreach ($this->requiredFields as $fieldName) {
            if (! isset($configToTest[$fieldName]) ) {
                return false;
            }
        }
        
        return true;
    }

    public function setRequiredFields()
    {
        $this->requiredFields =  [
            'field',
            'type',
            'size',
            'key',
            'extra',
            'default',
            'label',
            'show',
        ];
    }
}