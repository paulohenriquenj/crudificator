<?php

use PHPUnit\Framework\TestCase;

class routerTest extends TestCase {

    public function testRotaRoot()
    {
        $content = file_get_contents('http://localhost:8099/');
        
        $this->assertEquals('hello world!', $content);
    }
}