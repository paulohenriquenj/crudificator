<?php

namespace Crudificator\html;


class createHtmlElement{

    public $elementTypes = [];

    public function drawElement($fieldInfo)
    {
        if (empty($this->elementTypes) ) { 
            $this->setElementTypes();
        }
        
        $element = $this->getElementType($fieldInfo['type']);
        
        return $this->$element(
            $this->loadHtmlPartial($element),
            $fieldInfo
        );
               
    }

    public function loadHtmlPartial($htmlPartialName)
    {
        return require "partials/{$htmlPartialName}.php";
    }

    public function setElementTypes()
    {
        $element_types = require 'elementType.php';
        $this->elementTypes = $element_types['element_type'];

        return $this->elementTypes;
    }

    public function input_text($html, $fieldInfo, $class='')
    {
        return str_replace(
            ['__label__', '__class__'], 
            [$fieldInfo['label'], $class],
            $html
        );
    }

    public function form($action, $method, $class='')
    {
        return str_replace(
            ['__action__', '__method__', '__class__'],
            [$action, $method, $class],
            $this->loadHtmlPartial('form')
        );
    }

    public function formWraper($htmlInputs)
    {
        return str_replace(
            '__inputs__', 
            $htmlInputs, 
            $this->form('', 'GET')
        );
    }

    public function getElementType($type)
    {
        return $this->elementTypes[$type];
    }

}