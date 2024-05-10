<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Invitados</title>
</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container">
      Invitaciones
      <i class="bi bi-envelope-paper-heart-fill"></i>
    </div>
  </nav>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nombre</th>
        <th scope="col">Link</th>
        <th scope="col">Copear link al portapapeles</th>
      </tr>
    </thead>
    <tbody>
      <?php $contador=1;?>
      <?php foreach ($results as $registro): ?>
        <tr>
          <th scope="row"><?= $contador ?></th>
          <td><?= $registro["nombre"] ?></td>          
          <td>
            <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>" target="_blank" rel="noopener noreferrer">
              <i class="bi bi-arrow-right-square-fill"></i>
            </a>
          </td>
          <td>
            <button onclick="copiarTexto('http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>')">
              <i class="bi bi-copy"></i>
            </button>
          </td>
          <?php $contador++ ?>
        </tr>
      <?php endforeach; ?>      
    </tbody>
  </table>

  <?php
  echo "<pre>";
  print_r($results);
  echo "</pre>";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    function copiarTexto(arguemetno){
      console.log(arguemetno);
    }
  </script>
</body>

</html>