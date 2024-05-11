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

  <div class="container">
    <h5>
      Invitaciones de Lilián
    </h5>
  </div>

  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nombre</th>
          <th scope="col">Link</th>
          <th scope="col">Copear link</th>
        </tr>
      </thead>
      <tbody>
        <?php $contador = 1; ?>
        <?php foreach ($resultsLilian as $registro) : ?>
          <tr>
            <th scope="row"><?= $contador ?></th>
            <td><?= $registro["nombre"] ?></td>
            <td>
              <a class="btn btn-primary btn-sm" role="button" aria-disabled="true" href="http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-box-arrow-up-right"></i>
              </a>
            </td>
            <td>
              <button type="button" class="btn btn-primary btn-sm" onclick="copiarTexto('http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>')">
                <i class="bi bi-copy"></i>
              </button>
            </td>
            <?php $contador++ ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="container">
    <h5>
      Invitaciones de David
    </h5>
  </div>
  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nombre</th>
          <th scope="col">Link</th>
          <th scope="col">Copear link</th>
        </tr>
      </thead>
      <tbody>
        <?php $contador = 1; ?>
        <?php foreach ($resultsDavid as $registro) : ?>
          <tr>
            <th scope="row"><?= $contador ?></th>
            <td><?= $registro["nombre"] ?></td>
            <td>
              <a class="btn btn-primary btn-sm" role="button" aria-disabled="true" href="http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-box-arrow-up-right"></i>
              </a>
            </td>
            <td>
              <button type="button" class="btn btn-primary btn-sm" onclick="copiarTexto('http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>')">
                <i class="bi bi-copy"></i>
              </button>
            </td>
            <?php $contador++ ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    function copiarTexto(arguemetno) {
      navigator.clipboard.writeText(arguemetno)
				.then(() => {
					console.log('Texto copiado al portapapeles: '+arguemetno);
				})
				.catch(err => {
					console.error('Error al copiar el texto:', err);
				});
    }
  </script>
</body>

</html>