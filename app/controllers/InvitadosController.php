<?php
namespace App\Controllers;
use Database\PDO\Connection;

class InvitadosController {
    private $connection;

    public function __construct() {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    public function index(){
        $stmt = $this->connection->prepare("SELECT * FROM incomes");
        $stmt->execute();

        // Declaración de variables (opcional)
        $id = null;
        $invitado_de=null;
        $familia=null;
        $nombre = null;
        $slug = null;

        // Vincular los resultados a variables
        $stmt->bind_result($id, $invitado_de, $familia, $nombre, $slug);

        // Obtener y mostrar los registros
        while ($stmt->fetch()) {
            echo "ID: $id | Invitado de: $invitado_de |Familia: $familia | Nombre: $nombre | slug: $slug <br>";
        }

        $stmt->close();
    }
}