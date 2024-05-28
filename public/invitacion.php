<?php
if (isset($results)) {
  if (!empty($results)) {
    //Tratamiendo del nombre del invitado
    $minusculas = strtolower($results[0]["nombre"]);
    $palabras = explode(" ", $minusculas);
    $nombre = "";
    foreach ($palabras as $palabra) {
      if (strlen($palabra) > 1) {
        $palabra = strtoupper($palabra[0]) . substr($palabra, 1);
      }
      $nombre .= $palabra . " ";
    }
    $nombre = substr($nombre, 0, strlen($nombre) - 1);
  }
}

$rutabase="../../public/";

function generarEtiquetasImg($rutaCarpeta) {
  // Comprueba si la carpeta existe
  if (is_dir($rutaCarpeta)) {
      // Abre la carpeta
      if ($dh = opendir($rutaCarpeta)) {
        $contador=1;
          // Recorre todos los archivos de la carpeta
          while (($archivo = readdir($dh)) !== false) {
              // Comprueba si el archivo es una imagen
              if (preg_match("/.png$|.jpg$|.jpeg$|.gif$/i", $archivo)) {
                  // Imprime la etiqueta img con la ruta de la imagen
                  echo '<div class="carousel-item">
                    <img src="'.$rutaCarpeta.'/'.$archivo.'" alt="Imagen'.$contador.'" class="d-block w-100">
                    </div>';
                  $contador++;
              }
          }
          // Cierra la carpeta
          closedir($dh);
      }
  } else {
      echo 'La carpeta no existe. '.$rutaCarpeta.'<br>';
      echo $_SERVER['SCRIPT_FILENAME'].'<br>';
      echo dirname(__FILE__).'<br>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merienda:wght@300..900&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Icons de bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- AddEvent -->
  <link rel="stylesheet" href="https://cdn.addevent.com/libs/atc/themes/fff-theme-6/theme.css" type="text/css" media="all" />

  <!-- Estilos de la pagina -->
  <link rel="stylesheet" href="<?= $rutabase?>style.css">
  <!-- Preload -->
  <link rel="preload" href="<?= $rutabase ?>normalize.css" as="style">
  <link rel="stylesheet" href="<?= $rutabase ?>normalize.css">
  <!-- Icono de la pestaña -->
  <link rel="shortcut icon" href="<?= $rutabase ?>assets/images/anillo-de-bodas.png" type="image/x-icon">
  <title>Nuestra Boda</title>
</head>

<body>
  <!-- Seccion presentacion -->
  <div class="fondo">
    <img src="<?= $rutabase ?>/assets/images/invitacion vino (1).png" alt="presentacion">
    <div class="tiempo">
      <div>
        <h1 id="dias">123</h1>
        <p>Días</p>
      </div>
      <h2>:</h2>
      <div>
        <h1 id="horas">12</h1>
        <p>Horas</p>
      </div>
      <h2>:</h2>
      <div>
        <h1 id="minutos">12</h1>
        <p>Minutos</p>
      </div>
      <h2>:</h2>
      <div>
        <h1 id="segundos">12</h1>
        <p>Segundos</p>
      </div>
    </div>
  </div>

  <!-- Seccion Introduccion -->
  <div class="invitacion-intro">
    <!-- <img src="./assets/images/invitacionParticular.png" alt="Invitacion Particular"> -->
    <div class="invitacion-intro-texto text-center">
      <img src="<?= $rutabase ?>/assets/images/logo-removebg-preview.png" alt="logo">
      <p class="">
        Con nuestro amor, la presencia de dios entre mosotros y la bendicion de nuestros padres
      </p>
      <div class="contenedor">
        <div class="novios">
          <h4>Padres de la novia</h4>
          <p>Reyna Moran Montellano</p>
          <p>Juan Hernández Martínez <img src="<?= $rutabase ?>/assets/images/cruz.png" alt="cruz"></p>
        </div>
        <div class="novios">
          <h4>Padres del novio</h4>
          <p>Blanca Rita López Rasgado</p>
          <p>David Orozco Soto</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Seccion Invitaciones Particulares -->
  <?php
  if (isset($nombre)) {
    if (!empty($nombre)) {
      if ($results[0]["familia"] == 1) {
        require("./public/invParticularPlural.php");
      } else {
        require("./public/invParticularSingular.php");
      }
    }
  }
  ?>

  <!-- Seccion ubicaciones -->
  <div class="ubicaciones container">
    <div class="row">
      <div class="col align-self-center text-center">
        <h2 class="ubicaciones-titulo">Celebremos Juntos</h2>
        <h3 class="ubicaciones-fecha">7 de diciembre de 2024</h3>
      </div>
    </div>
    <div class="row">
      <!-- Ceremonio religiosa -->
      <div class="col-12 col-md-6 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-titulo text-center">Ceremonio Religiosa 2:45 PM</h2>
            <img src="<?= $rutabase ?>assets/images/iglesia.jpg" class="card-img-top " alt="iglesia">
            <h2 class="card-titulo text-center">parroquia reina de las americas</h2>
            <!-- <p class="card-text"><span>Cuándo: </span> 7 de diciembre de 2024 a las 2:45 PM. </p> -->

            <p class="card-text"><span>Dirección: </span>
              Av. México Manzana 001, Dos Ríos, 52790 Huixquilucan de Degollado, Méx.
            </p>

            <div class="container">
              <div class="row text-center">
                <div class="col-6">
                  <!-- Boton Ver Mapa -->
                  <button type="button" class="btn btn-primary w-100 h-100" data-bs-toggle="modal" data-bs-target="#iglesiaModal">
                    Ver Mapa
                  </button>
                </div>
                <div class="col-6">
                  <!-- Boton agendar -->
                  <button type="button" class="btn btn-primary w-100 h-100 addeventatc" data-bs-toggle="modal" data-bs-target="#agendarModal" data-styling="none" data-id="ym21322816">
                    Agendar en el calendario
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Iglesia-->
        <div class="modal fade" id="iglesiaModal" tabindex="-1" aria-labelledby="iglesiaModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="iglesiaModalLabel">Ceremonia Religiosa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.9372558213104!2d-99.34305529999999!3d19.371869300000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d207b5af925b57%3A0xe5a881d93949f253!2sPARROQUIA%20REINA%20DE%20LAS%20AMERICAS!5e0!3m2!1ses-419!2smx!4v1713553676090!5m2!1ses-419!2smx" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <hr>
                <h5>parroquia reina de las americas</h5>
                <p><span>Cuándo:</span> 7 de Diciembre de 2024 a las 2:45 PM.</p>
                <p><span>Dirección:</span> Av. México Manzana 001, Dos Ríos, 52790 Huixquilucan de Degollado, Méx.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Recepción -->
      <div class="col-12 col-md-6 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-titulo text-center">Recepción 5:00 PM</h2>
            <img src="<?= $rutabase ?>assets/images/salon.jpg" alt="Jardin la Loma" class="card-img-top">
            <h2 class="card-titulo text-center">jardín la loma</h2>
            <!-- <p class="card-text"><span>Cuándo: </span>7 de diciembre de 2024 a las 5:00 PM.</p> -->

            <p class="card-text"><span>Dirección: </span>
              Carretera San Ramón, KM 0.5 Col. San Ramón 52760 Huixquilucan (Estado México)
            </p>

            <div class="container">
              <div class="row text-container">
                <div class="col-6">
                  <!-- Button Ver Mapa modal -->
                  <button type="button" class="btn btn-primary w-100 h-100" data-bs-toggle="modal" data-bs-target="#recepcionModal">
                    Ver Mapa
                  </button>
                </div>
                <div class="col-6">
                  <!-- Boton agendar -->
                  <button type="button" class="btn btn-primary w-100 h-100 addeventatc" data-bs-toggle="modal" data-bs-target="#agendarModal" data-styling="none" data-id="Vr21323324">
                    Agendar en el calendario
                  </button>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Recepción Modal -->
        <div class="modal fade" id="recepcionModal" tabindex="-1" aria-labelledby="recepcionModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="iglesiaModalLabel">Recepción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.8792984870756!2d-99.33786212405893!3d19.37437834253626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d207b28de7f103%3A0x2e563b0f51ce818c!2sJard%C3%ADn%20La%20Loma!5e0!3m2!1ses-419!2smx!4v1713566446206!5m2!1ses-419!2smx" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <hr>
                <h5>jadín la loma</h5>
                <p><span>Cuándo:</span> 7 de Diciembre de 2024 a las 5:00 PM.</p>
                <p><span>Dirección:</span> Carretera San Ramón, KM 0.5 Col. San Ramón 52760 Huixquilucan (Estado México)
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Seccion itinerario -->
  <div class="itinerario">
    <img src="<?= $rutabase ?>/assets/images/itinerario.png" alt="itinerario">
  </div>

  <!-- Carrusel de Imagenes -->
  <div class="container">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
          generarEtiquetasImg($rutabase.'/assets/images/');

        ?>
        <!-- <div class="carousel-item active">
          <img src="<?= $rutabase ?>/assets/images/gallitos/_a6d4a9ca-7ec4-4245-8e93-c3d9479814e5.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?= $rutabase ?>/assets/images/gallitos/_bb8d73b5-53ab-477f-9794-28e0c299ac49.jpg" class="d-block w-100" alt="...">
        </div> -->
        
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- Seccion mesa de regalos -->
  <div class="mesa-regalos">
    <div class="container text-center">
      <div class="row">
        <h1>mesa de regalos</h1>
      </div>
      <div class="row">
        <p>
          Nuestro mayor regalo es tu presencia, pero si deseas obsequiarnos algo, te dejamos algunas opciones:
        </p>
      </div>
      <div class="row d-flex justify-content-center align-items-center">
        <a href="https://mesaderegalos.liverpool.com.mx/" rel="noopener noreferrer" target="_blank" class="btn-mesa col-12 col-lg-6 m-3">
          <img src="<?= $rutabase ?>/assets/images/logos/Liverpool.png" alt="Liverpool">
        </a>
        <a href="https://www.amazon.com.mx/registries" rel="noopener noreferrer" target="_blank" class="btn-mesa col-12 col-lg-6 m-3">
          <img src="<?= $rutabase ?>/assets/images/logos/Amazon.png" alt="Amazon">
        </a>
        <a href="https://www.sears.com.mx/Mesa-de-Regalos/" rel="noopener noreferrer" target="_blank" class="btn-mesa col-12 col-lg-6 m-3">
          <img src="<?= $rutabase ?>/assets/images/logos/Sears.svg" alt="Sears">
        </a>
      </div>

      <!-- Ocultar datos Bancarios 
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-8 d-flex justify-content-center align-items-center">
          <div class="btn-banco mb-3" data-bs-toggle="collapse" data-bs-target="#collapseBanco" aria-expanded="false" aria-controls="collapseBanco">
            <i class="bi bi-bank"></i> Ver Datos bancarios
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-md-6">
          <div class="collapse" id="collapseBanco">
            <div class="card card-body">
              <p>BANCO: XXXXXXXXXXX</p>
              <p>Nº DE CUENTA: XXXXXXXX</p>
              <p>CUENTA CLABE: XXXXXXXX</p>
              <p>TITULAR: XXXXXXXXXX</p>
            </div>
          </div>
        </div>
      </div>
      -->
    </div>
  </div>

  <!-- Seccion confrimar asistencia -->
  <div class="confirmar-asistencia container text-center">
    <h1>Confirmar asistencia</h1>
    <p>
      ¡Gracias por compartir este día tan especial con nosotros!
    </p>
    <p>Favor de confirmar su presencia.</p>
    <p>
      Te esperamos
    </p>
    <div class="d-flex flex-column justify-content-center align-items-center">
      <a href="https://wa.me/1111111111111?text=Hola%20Lili%C3%A1n%2C%20esto%20es%20una%20prueba%20de%20confirmar%20la%20asistencia" target="_blank">
        <p class="whats">
          <i class="bi bi-whatsapp"></i> Confirmar a Lilián
        </p>
      </a>
      <a href="https://wa.me/5215527201409?text=Hola%20David%2C%20esto%20es%20una%20prueba%20de%20confirmar%20la%20asistencia" target="_blank">
        <p class="whats">
          <i class="bi bi-whatsapp"></i> Confirmar a David
        </p>
      </a>
    </div>
  </div>

  <!-- Boton de musica -->
  <div class="musica">
    <i id="botonMusica" class="bi bi-volume-mute-fill"></i>
    <audio id="musicaFondo" src="<?= $rutabase ?>/assets/music/Johann Pachelbel - Canon in D Major.mp3"></audio>
  </div>
  <!-- Modal de musica -->
  <div class="modal fade" id="modalMusica" tabindex="-1" aria-labelledby="modalMusicaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <h5>
            Bienvenidos a la invitación de Lilián y David
          </h5>
          <div class="">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
              Solo leer
              <i class="bi bi-book"></i>
            </button>
            <button id="verConMusica" type="button" class="btn btn-primary" data-bs-dismiss="modal">
              Ver con musica
              <i class="bi bi-music-note-beamed"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="text-center">
      <a href="https://github.com/Motorbreath-lml" target="_blank">
        <i class="bi bi-terminal"></i> Coding by Jerack
      </a>
    </div>
  </footer>

  <!-- JS de AddEvent -->
  <script type="text/javascript" src="https://cdn.addevent.com/libs/atc/1.6.1/atc.min.js"></script>

  <!-- JS de Bootrstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="<?= $rutabase?>main.js"></script>
</body>

</html>
