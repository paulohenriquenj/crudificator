<?php

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
