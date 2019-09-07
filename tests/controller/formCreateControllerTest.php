<?php

use Crudificator\controller;
use Crudificator\controller\formCreateController;

class formCreateControllerTest extends PHPUnit\Framework\TestCase{

    public function testVerificationOfRequiredFields()
    {
        $this->initFcc();

        $this->assertTrue($this->fcc->haveAllRequiredFields(($this->config())[0]));

    }

    // public function test(Type $var = null)
    // {
    //     $this->fcc->createFormElement();
    // }

    public function initFcc()
    {
        $config = $this->config();

        $this->fcc = new formCreateController($config);
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
