<?php

$routesStr  = '// Index <br />';
$routesStr .= "Flight::route('GET /__rota__', function() {<br />\t\$ctrl = new __rota__Controller;<br />}); <br /><br />";

$routesStr .= '// Create <br />';
$routesStr .= "Flight::route('GET /__rota__/novo', function() {<br />\t\$ctrl = new __rota__Controller;<br />}); <br /><br />";

$routesStr .= '// Store <br />';
$routesStr .= "Flight::route('POST /__rota__', function() {<br />\t\$ctrl = new __rota__Controller;<br />}); <br /><br />";

$routesStr .= '// Show <br />';
$routesStr .= "Flight::route('GET /__rota__/@id', function() {<br />\t\$ctrl = new __rota__Controller;<br />}); <br /><br />";

$routesStr .= '// Edit <br />';
$routesStr .= "Flight::route('GET /__rota__/@id/editar', function() {<br />\t\$ctrl = new __rota__Controller;<br />}); <br /><br />";

$routesStr .= '// Update <br />';
$routesStr .= "Flight::route('POST /__rota__/@id', function() {<br />\t\$ctrl = new __rota__Controller;<br />}); <br /><br />";

$routesStr .= '// Delete <br />';
$routesStr .= "Flight::route('POST /__rota__/@id/delete', function() {<br />\t\$ctrl = new __rota__Controller;<br />}); <br /><br />";

$routesStr .= "Flight::start();";

return $routesStr;