<?php

namespace Crudificator\html;


class createHtmlElement{

    public $elementTypes = [];

    public function drawElement($fieldInfo)
    {
        if(empty($this->elementTypes)) { 
            $this->setElementTypes();
        }
        $elementType = $this->getElementType($fieldInfo['type']);
        $html = $this->loadHtmlPartial($elementType);

        dump($this->$elementType($html, $fieldInfo));
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

    public function input_text($html, $fieldInfo)
    {
        $html = str_replace('__label__', $fieldInfo['label'], $html);
        return $html;
    }

    public function getElementType($type)
    {
        return $this->elementTypes[$type];
    }

}