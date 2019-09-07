<?php

use PHPUnit\Framework\TestCase;

class sqliteFormTest extends TestCase {

    public function testRotaSqlite()
    {
        $content = file_get_contents('http://localhost:8099/config/database?db_type=sqlite');
        
        $this->assertStringContainsString('Path', $content);
    }
}