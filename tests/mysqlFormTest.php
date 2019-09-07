<?php

use PHPUnit\Framework\TestCase;

class mysqlFormTest extends TestCase {

    public function testRotaMysql()
    {
        $content = file_get_contents('http://localhost:8099/config/database?db_type=mysql');
        
        $this->assertStringContainsString('Host', $content);
    }
}