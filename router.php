<?php

use Crudificator\controller;
use Crudificator\controller\crudificatorController;

Flight::set('flight.views.path', __DIR__.'/views');


Flight::route('/', function () use($supportedDataBases){
    Flight::render('selectDataBaseType', ['supportedDataBases' => $supportedDataBases], 'content');
    Flight::render('layout');
});

/**
 * Rotas de configuração do banco e suas credenciais
 */
Flight::route('GET /config/database', function () {
    $form = 'forms/' . strtolower(Flight::request()->query->db_type) . 'Credentials.php';
    if( file_exists(Flight::get('flight.views.path').'/'.$form) ) {
        Flight::render($form, [], 'content');
        Flight::render('layout');
        Flight::stop();
    }

    Flight::halt(500, 'Form não encontrado.');
});


Flight::route('POST /database/tableInfo', function () {

    $crudController = new crudificatorController();

    
    $crudController->getTableInfo([
        'userName' => flight::request()->data['user'],
        'password' => flight::request()->data['password'],
        'host' => flight::request()->data['host'],
        'database' => flight::request()->data['database'],
        'db_type' => Flight::request()->data['db_type'],
        'table' => Flight::request()->data['table'],
    ]);


    // Flight::halt(500, 'Form não encontrado.');
});
