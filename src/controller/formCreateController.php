<?php

namespace Crudificator\controller;

class formCreateController
{

    public function __construct($config) {
        $this->config = $config;
    }

    public function createForm()
    {
        array_walk(
            $this->config,
            [$this, 'createFormElement']
        );
    }

    private function createFormElement($field, $value)
    {
        echo $field . '=> ' . $value;
        echo '<br>';
    }
}