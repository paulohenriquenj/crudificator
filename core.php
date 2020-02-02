<?php

require_once __DIR__.'/vendor/autoload.php';

require_once __DIR__.'/src/utils.php';

if( file_exists(__DIR__ . '/.env') ) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

$supportedDataBases = require 'src/supportedDatabases.php';

