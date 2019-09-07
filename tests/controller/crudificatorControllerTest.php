<?php

use Crudificator\controller;
use Crudificator\controller\crudificatorController;

class crudificatorControllerTest extends PHPUnit\Framework\TestCase{

    public function testInstaceOfDatabaseIsCorrect()
    {
        $crudController = new crudificatorController();

        $crudController->setDataBase('mysql');
        
        $crudController->createDatabasInstance();

        $this->assertStringContainsString('mysql', get_class($crudController->db));

    }
}
