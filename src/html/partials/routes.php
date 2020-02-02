<?php

$routesStr  = <<<ROTAS
// routes.php

// Index
Flight::route('GET /__rota__', function() {
    \$ctrl = new __rota__Controller;
    \$ctrl->fetchAll();
});

// Create
Flight::route('GET /__rota__/novo', function() {
    \$ctrl = new __rota__Controller;
    \$ctrl->showForm();
});

// Store
Flight::route('POST /__rota__', function() {
    \$ctrl = new __rota__Controller;
    \$data = Flight::request()->getBody();
    \$ctrl->insert(\$data);
});

// Show
Flight::route('GET /__rota__/@id', function(\$id) {
    \$ctrl = new __rota__Controller;
    if( \$ctrl->find(\$id) ) {
        \$ctrl->show();
    }
});

// Edit
Flight::route('GET /__rota__/@id/editar', function(\$id) {
    \$ctrl = new __rota__Controller;
    if( \$ctrl->find(\$id) ) {
        \$ctrl->showEditForm();
    }
});

// Update
Flight::route('POST /__rota__/@id', function(\$id) {
    \$ctrl = new __rota__Controller;
    \$data = Flight::request()->getBody();
    \$ctrl->update(\$data);
});

// Delete
Flight::route('POST /__rota__/@id/deletar', function(\$id) {
    \$ctrl = new __rota__Controller;
    \$ctrl->delete(\$id)
});

// Flight::start();
ROTAS;

return $routesStr;