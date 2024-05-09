<?php

namespace Database\PDO;

class Connection {

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
        $server = "localhost"; // sql212.infinityfree.com
        $database = "invitaciones_boda"; // if0_36477305_finanzas_personales
        $username = "root"; // if0_36477305
        $password = ""; // MlM6FF3q1i3Jdo

        $conexion = new \PDO("mysql:host=$server;dbname=$database", $username, $password);

        $setnames = $conexion->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $conexion;
    }
    
}