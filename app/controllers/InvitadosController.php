<?php

namespace App\Controllers;

use Database\PDO\Conection;

class InvitadosController
{
    private $connection;

    public function __construct()
    {
        $this->connection = Conection::getInstance()->get_database_instance();
    }

    public function create()
    {
        require("./public/invitacion.php");
    }

    public function store($data)
    {
        //Identificar si el slug es unico, si no agregar un contador al final
        $slug=$this->generarSlug($data["nombre"]);
        $stmt = $this->connection->prepare("SELECT * FROM invitados WHERE slug='$slug'");
        $stmt->execute();
        $result = $stmt->fetch();
        $contador=1;
        $slugNuevo=null;
        while($result){
            $slugNuevo=$slug."-".$contador;
            $stmt = $this->connection->prepare("SELECT * FROM invitados WHERE slug='$slugNuevo'");
            $stmt->execute();
            $result = $stmt->fetch();
            $contador++;
        }
        $slug=$slugNuevo??$slug;        

        $stmt = $this->connection->prepare("INSERT INTO invitados (nombre, invitado_de, familia, numero_pases, slug) VALUES (:nombre, :invitado_de, :familia,  :numero_pases, :slug)");
        $stmt->bindValue(":nombre", $data["nombre"]);
        $stmt->bindValue(":invitado_de", $data["invitado_de"]);
        $stmt->bindValue(":familia", $data["familia"]);
        $stmt->bindValue(":numero_pases", $data["numero_pases"]);
        $stmt->bindValue(":slug", $slug);
        $stmt->execute();

        header("location: /control");

        // echo $data["nombre"] . "<br>";
        // echo $data["invitado_de"] . "<br>";
        // echo $data["familia"] . "<br>";
        // echo $data["numero_pases"] . "<br>";
    }

    public function invitacion($slug)
    { //antes era show
        if ($slug != null) {
            $stmt = $this->connection->prepare("SELECT * FROM invitados WHERE slug='$slug'");
            $stmt->execute();
            $results = $stmt->fetchAll();
        }
        require("./public/invitacion.php");
    }

    public function index()
    { //antes era control
        $stmt = $this->connection->prepare("SELECT * FROM invitados WHERE invitado_de='lilian'");
        $stmt->execute();
        $resultsLilian = $stmt->fetchAll();

        $stmt = $this->connection->prepare("SELECT * FROM invitados WHERE invitado_de='david'");
        $stmt->execute();
        $resultsDavid = $stmt->fetchAll();

        require("./public/control.php");
    }

    private function generarSlug($titulo)
    {
        // Convertir el título a minúsculas
        $tituloMinusculas = strtolower($titulo);

        // Eliminar caracteres especiales
        $slug = preg_replace('/[^a-zA-Z0-9-]+/', '-', $tituloMinusculas);

        // Eliminar guiones consecutivos
        $slug = preg_replace('/-+/', '-', $slug);

        // Cortar el slug a una longitud máxima
        $longitudMaxima = 255;
        if (strlen($slug) > $longitudMaxima) {
            $slug = substr($slug, 0, $longitudMaxima);
        }

        return $slug;
    }
}
