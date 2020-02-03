<?php

$routesStr  = <<<ROTAS
// routes.php

// Index
Flight::route('GET /usuario', function() {
    \$ctrl = new usuarioController;
    \$ctrl->drawTable( \$ctrl->fetchAll() );
});

// Create
Flight::route('GET /usuario/novo', function() {
    \$ctrl = new usuarioController;
    \$ctrl->showForm();
});

// Store
Flight::route('POST /usuario', function() {
    \$ctrl = new usuarioController;
    \$ctrl->insert( Flight::request() );
});

// Show
Flight::route('GET /usuario/@id', function(\$id) {
    \$ctrl = new usuarioController;
    if( \$ctrl->find(\$id) ) {
        \$ctrl->show();
    }
});

// Edit
Flight::route('GET /usuario/@id/editar', function(\$id) {
    \$ctrl = new usuarioController;
    if( \$ctrl->find(\$id) ) {
        \$ctrl->showEditForm();
    }
});

// Update
Flight::route('POST /usuario/@id', function(\$id) {
    \$ctrl = new usuarioController;
    \$ctrl->update( Flight::request() );
});

// Delete
Flight::route('POST /usuario/@id/deletar', function(\$id) {
    \$ctrl = new usuarioController;
    \$ctrl->delete(\$id);
});

// Flight::start();
ROTAS;

return $routesStr;