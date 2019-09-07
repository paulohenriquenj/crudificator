<?php

use PHPUnit\Framework\TestCase;

class coreTest extends TestCase {

    public function testSupportedDatabaesIsDefined()
    {
        include __DIR__.'/../core.php';

        $this->assertArrayHasKey('supported_databases', $supportedDataBases);
    }
}