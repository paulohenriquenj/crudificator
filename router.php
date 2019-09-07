<?php

Flight::set('flight.views.path', __DIR__.'/views');


Flight::route('/', function () {
    Flight::render('selectDataBaseType', array('database' => 'Mysql'), 'content');
    Flight::render('layout');
});

