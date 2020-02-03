<?php

$controllerStr  = <<<CONTROLLER
// __rota__Controller.php

class __rota__Controller
{
    public \$db;
    public \$rows = null;

    public function __construct()
    {
        \$this->db = new PDO('mysql:host=__db_host__;dbname=__db_name__', '__db_user__', '__db_pass__');
    }

    /**
     * retorna todos os registros da tabela
     */
    public function fetchAll()
    {
        \$stmt = \$this->db->prepare("SELECT * FROM __tabela__");
        \$stmt->execute();

        return \$stmt->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }

    public function drawTable(array \$rows)
    {
        \$tabela = '<table border="1" class="table table-striped">';
        foreach(\$rows as \$row) {
            \$tabela .= '<tr>';
            foreach(\$row as \$info) {
                \$tabela .= '<td>' . \$info . '</td>';
            }
            \$tabela .= '<td><a href="/__rota__/__id__/editar">editar</a> <a href="/__rota__/__id__/deletar">deletar</a></td>';
            \$tabela .= '</tr>';
        }
        \$tabela .= '</table>';

        echo \$tabela;
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
        \$stmt = \$this->db->prepare("SELECT * FROM __tabela__ WHERE __fkey__ = " . intval(\$id));
        \$stmt->execute();

        \$this->rows = \$stmt->fetchAll(PDO::FETCH_ASSOC);

        if( ! empty(\$this->rows) ) {
            return true;
        }

        return  false;
    }

    public function show()
    {
        // @todo show record info
        var_dump(\$this->rows);
        exit;
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