<?php

$controllerStr  = <<<CONTROLLER
// __rota__Controller.php

class __rota__Controller
{
    public \$db;

    public function __construct()
    {
        \$this->db = new PDO('mysql:host=localhost;dbname=dbname', 'username', 'password');
    }

    /**
     * retorna todos os registros da tabela
     * /
    public function fetchAll()
    {
        \$stmt = \$this->db->prepare("SELECT * FROM __tabela__");
        \$stmt->execute();

        echo json_encode( \$stmt->fetchAll() );
    }

    public function showForm()
    {
        // 
    }

    public function insert(\$data)
    {
        // 
    }

    public function find(\$id)
    {
        // 
    }

    public function show()
    {
        // 
    }

    public function showEditForm()
    {
        // 
    }

    public function update(\$data)
    {
        // 
    }

    public function delete(\$id)
    {
        // 
    }
}
CONTROLLER;

return $controllerStr;