<?php
require("./vendor/autoload.php");

use Router\RouterHandler;
use App\Controllers\InvitadosController;

// Obtener la URL
$slug = $_GET["slug"] ?? ""; //Revisa si existe el parametro slug, en caso de que no exista de le asigna una cadena vacia
$slug = explode("/", $slug); //Todo el string de slug lo divide en un arreglo usando '/' como separador

//Obtener el controlador y el id
$resource = $slug[0] == "" ? "/" : $slug[0];// se verifica el primer elemento del arreglo $slug si esta vacio, $resource vale "/" en caso contrario $resource vale $slug[0]
$id = $slug[1] ?? null; //Si el segundo elemento no existe o está vacío, se asigna null como valor predeterminado, en caso contrario $id=$slug[1]

$router = new RouterHandler();

switch ($resource){
    case 'control':
        $method = "control";
        $router->set_method($method);
        $router->route(InvitadosController::class, $id);
        break;
    case 'invitacion':
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(InvitadosController::class, $id);
        break;
    default:
        echo "Mostrar invitacion general desde el index";
        break;
}