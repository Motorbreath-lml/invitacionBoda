<?php
namespace App\Controllers;
use Database\PDO\Conection;

class InvitadosController {
    private $connection;

    public function __construct() {
        $this->connection = Conection::getInstance()->get_database_instance();
    }

    public function index(){
        require ("./public/invitacion.php");
    }

    public function show($slug){        
        $stmt = $this->connection->prepare("SELECT * FROM invitados WHERE slug='$slug'");
        $stmt->execute();
        $results = $stmt->fetchAll();
        require("./public/invitacion.php");
    }

    public function control(){
        $stmt = $this->connection->prepare("SELECT * FROM invitados WHERE invitado_de='lilian'");
        $stmt->execute();
        $resultsLilian = $stmt->fetchAll();

        $stmt = $this->connection->prepare("SELECT * FROM invitados WHERE invitado_de='david'");
        $stmt->execute();
        $resultsDavid = $stmt->fetchAll();

        require("./public/control.php");
    }
}