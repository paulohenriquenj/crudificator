<?php

namespace Crudificator\controller;

use Crudificator\filter\filterNotShowFieldOnForm;

class formCreateController
{
    public $requiredFields=[];

    public function __construct($config) {
        $this->config = $config;
        $this->setRequiredFields();
        $this->filter = new filterNotShowFieldOnForm();
    }

    public function createForm()
    {
        array_walk(
            $this->config,
            [$this, 'createFormElement']
        );

        return implode('<p>', $this->htmlElements);
    }

    private function createFormElement($fieldInfo)
    {
        if ($this->haveAllRequiredFields($fieldInfo) ) {
            array_walk($fieldInfo,
                function ($value, $key) {
                    if (! $this->filter->hasRestriction($key, $value) ) {
                        $this->htmlElementCreate($key, $value);
                    }
                }
            );
            return true;
        }

        abort('Missin required info.');
    }

    public function htmlElementCreate($key, $value)
    {
        
        $this->htmlElements [$key] = 'Elemento: ' . $value;
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