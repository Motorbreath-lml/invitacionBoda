<?php

namespace Database\PDO;

class Conection {

    private static $instance;
    private $connection;

    private function __construct() {
        $this->make_connection();
    }

    public static function getInstance() {
        if (!self::$instance instanceof self)
            self::$instance = new self();

        return self::$instance;
    }

    public function get_database_instance() {
        return $this->connection;
    }

    private function make_connection() {
        $server = "localhost"; 
        $database = "invitaciones_boda"; 
        $username = "root"; 
        $password = ""; 

        $conexion = new \PDO("mysql:host=$server;dbname=$database", $username, $password);

        $setnames = $conexion->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $conexion;
    }
    
}