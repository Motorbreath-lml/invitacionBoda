<?php
namespace App\Controllers;
use Database\PDO\Conection;

class InvitadosController {
    private $connection;

    public function __construct() {
        $this->connection = Conection::getInstance()->get_database_instance();
    }

    public function index(){
        echo "Mostrar invitacion general";
    }

    public function show($slug){
        echo "mostrar la invitavion con el slug $slug";
    }

    public function control(){
        $stmt = $this->connection->prepare("SELECT * FROM invitados");
        $stmt->execute();
        $results = $stmt->fetchAll();        
        require("./public/control.php");
    }
}