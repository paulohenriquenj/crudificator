<?php

namespace Crudificator\controller;

use Crudificator\html\createHtmlElement;
use Crudificator\filter\filterNotShowFieldOnForm;

class formCreateController
{
    public $requiredFields=[];

    public function __construct($config) {
        $this->config = $config;
        $this->setRequiredFields();
        $this->filter = new filterNotShowFieldOnForm();
        $this->html = new createHtmlElement();
    }

    public function createForm()
    {
        array_walk(
            $this->config,
            [$this, 'createFormElement']
        );

        return $this->html->formWraper(implode(' ', $this->htmlElements));
    }

    private function createFormElement($fieldInfo)
    {
        if ($this->haveAllRequiredFields($fieldInfo) ) {

            foreach ($fieldInfo as $key => $value) {
                if($this->filter->hasRestriction($key, $value) ) {
                    return;
                }
            }
            
            $this->htmlElementCreate($fieldInfo);
            
            return true;
        }

        abort('Missin required info.');
    }

    public function htmlElementCreate($field)
    {
        $this->htmlElements [] = $this->html->drawElement($field);
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