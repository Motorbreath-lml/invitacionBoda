<?php

$filename = './invitadosLilian.txt'; // Replace with the actual filename

if (file_exists($filename)) {
    $fileContent = file_get_contents($filename);
    //echo $fileContent; // Displays the entire file content
    creacionInserts($fileContent);
} else {
    echo "Error: File '$filename' not found.";
}

function creacionInserts($fileContent)
{
    $lines = explode("\n", $fileContent); // Divide en líneas
    $inserts = [];
    array_push($inserts, "INSERT INTO invitados (invitado_de, familia, nombre, slug) VALUES\n");

    foreach ($lines as $line) {
        $line=trim($line);
        $sentencia = "('lilian',";
        if (preg_match('/FAM/', $line)) { //FAM en alguna parte de la sentencia
            $sentencia .= '1,';
        } else {
            $sentencia .= '0,';
        }
        $sentencia .= "'$line', '" . generarSlug($line) . "'),\n";
        array_push($inserts,$sentencia);
    }
    $ultimoElemento= array_pop($inserts);
    $ultimoElemento=substr($ultimoElemento,0,strlen($ultimoElemento)-2);
    $ultimoElemento.=";";
    array_push($inserts,$ultimoElemento);

    echo "EL array inserts:\n";
    var_dump($inserts);

    $filename = 'inserts.sql'; // Nombre del archivo   

    if (file_put_contents($filename, $inserts)) {
        echo "Archivo creado y líneas escritas correctamente.";
    } else {
        echo "Error: No se pudo escribir en el archivo.";
    }
}

function generarSlug($titulo)
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

/*


  ('Juan Pérez', 'juan.perez@ejemplo.com', 'Ciudad de México'),
  ('María García', 'maria.garcia@ejemplo.com', 'Guadalajara'),
  ('Pedro López', 'pedro.lopez@ejemplo.com', 'Monterrey'),
  ('Ana Sánchez', 'ana.sanchez@ejemplo.com', 'Puebla'),
  ('Carlos Rodríguez', 'carlos.rodriguez@ejemplo.com', 'Tijuana');

*/