<?php

Flight::set('flight.views.path', __DIR__.'/views');


Flight::route('/', function () use($supportedDataBases){
    Flight::render('selectDataBaseType', ['supportedDataBases' => $supportedDataBases], 'content');
    Flight::render('layout');
});

