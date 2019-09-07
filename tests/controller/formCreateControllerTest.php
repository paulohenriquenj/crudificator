<?php

use Crudificator\controller;
use Crudificator\controller\formCreateController;

class formCreateControllerTest extends PHPUnit\Framework\TestCase{

    public function testVerificationOfRequiredFields()
    {
        $config = $this->config();

        $fcc = new formCreateController($config);

        $this->assertTrue($fcc->haveAllRequiredFields($config[0]));

    }

    private function config()
    {
        return [
            [
                'field' => '',
                'type' => '',
                'size' => '',
                'key' => '',
                'extra' => '',
                'default' => '',
                'label' => '',
                'show' => ''
            ],
        ];
    }
}
