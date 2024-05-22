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
    <div id="liveAlertPlaceholder"></div>
  </div>

  <div class="container text-center">
    <div class="row justify-content-end">
      <div class="col-auto">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
          <i class="bi bi-person-plus"></i>
          Agregar invitados
        </button>
      </div>
    </div>
  </div>

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
          <th scope="col">Numero de Pases</th>          
          <th scope="col">Es una familia</th>
          <th scope="col">Invitacion</th>
          <th scope="col">Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php $contador = 1; ?>
        <?php foreach ($resultsLilian as $registro) : ?>
          <tr>
            <th scope="row"><?= $contador ?></th>
            <td><?= $registro["nombre"] ?></td>
            <td><?= $registro["numero_pases"] ?></td>
            <?php $esFamilia=($registro["familia"]>0)? "Si":"No"; ?>
            <td><?= $esFamilia ?></td>
            <td>
              <a class="btn btn-info btn-sm" role="button" aria-disabled="true" href="http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-box-arrow-up-right"></i>
                Ver
              </a>
              <button type="button" class="btn btn-primary btn-sm" onclick="copiarTexto('http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>')">
                <i class="bi bi-copy"></i>
                Copear
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#createModal" data-bs-id="<?= $registro["id"] ?>">
                <i class="bi bi-pencil-square"></i>
                Editar
              </button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= $registro["id"] ?>">
                <i class="bi bi-trash3"></i>
                Eliminar
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
          <th scope="col">Numero de Pases</th>
          <th scope="col">Es una famila</th>
          <th scope="col">Invitacion</th>
          <th scope="col">Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php $contador = 1; ?>
        <?php foreach ($resultsDavid as $registro) : ?>
          <tr>
            <th scope="row"><?= $contador ?></th>
            <td><?= $registro["nombre"] ?></td>
            <td><?= $registro["numero_pases"] ?></td>
            <?php $esFamilia=($registro["familia"]>0)? "Si":"No"; ?>
            <td><?= $esFamilia ?></td>
            <td>
              <a class="btn btn-info btn-sm" role="button" aria-disabled="true" href="http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-box-arrow-up-right"></i>
                Ver
              </a>
              <button type="button" class="btn btn-primary btn-sm" onclick="copiarTexto('http://<?= $_SERVER['HTTP_HOST'] ?>/invitacion/<?= $registro["slug"] ?>')">
                <i class="bi bi-copy"></i>
                Copear
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#createModal" data-bs-id="<?= $registro["id"] ?>">
                <i class="bi bi-pencil-square"></i>
                Editar
              </button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= $registro["id"] ?>">
                <i class="bi bi-trash3"></i>
                Eliminar
              </button>
            </td>
            <?php $contador++ ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal Crear/Editar -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createModalLabel">Datos del/los invitado(s)</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formCrear" action="/control/store" method="post">
            <input id="inputMethod" type="hidden" name="method" value="post">
            <input id="inputId" type="hidden" name="id" value="">

            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="p.ej SEÑOR LOPEZ, FAMILIA PEREZ" required>

            <fieldset class="mt-3">
              <p class="mb-2">Invitado de:</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="invitado_de" id="invitado_de1" value="lilian" checked>
                <label class="form-check-label" for="invitado_de1">
                  Lilián
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="invitado_de" id="invitado_de2" value="david">
                <label class="form-check-label" for="invitado_de2">
                  David
                </label>
              </div>
            </fieldset>

            <fieldset class="mt-3">
              <p class="mb-2">La invitacion es para:</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="familia" id="familia1" value="1" checked>
                <label class="form-check-label" for="familia1">
                  Una familia
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="familia" id="familia2" value="0">
                <label class="form-check-label" for="familia2">
                  Una persona
                </label>
              </div>
            </fieldset>

            <div class="row mt-3">
              <label for="numero_pases" class="form-label">Numero de pases asignados:</label>
              <input type="number" id="numero_pases" name="numero_pases" min="1" step="1" value="2" class="form-control" required>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button id="btn-guardar-modal" type="button" class="btn btn-primary" data-bs-dismiss="modal">Guardar invitado(s)</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Eliminar -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Desea eliminar la invitacion para <span id="invitadoSpan"></span> ?
        </div>

        <div class="modal-footer">
          <form id="deleteForm" action="" method="post">
            <input type="hidden" name="deleteId" id="deleteId" value="">
            <input type="hidden" name="method" value="delete">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    // Modal Eliminar
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    const deleteId = document.getElementById('deleteId');
    const invitadoSpan = document.getElementById('invitadoSpan');

    deleteModal.addEventListener('shown.bs.modal', () => {
      let button = event.relatedTarget
      let id = button.getAttribute('data-bs-id')
      console.log('Voy a mandar a eliminar el id:' + id);
      const url = 'control/' + id; // URL de destino
      const options = {
        method: 'GET', // Método de solicitud (GET, POST, PUT, etc.)
        headers: {
          'Content-Type': 'application/json' // Tipo de contenido del cuerpo de la solicitud (si es necesario)
        }
      };
      fetch(url, options)
        .then(response => response.json()) // Convertir la respuesta a JSON
        .then(data=>{
          invitadoSpan.textContent=data.nombre;
          deleteForm.action='/control/'+id;
        })
        .catch(error => console.error('Error:', error)); // Manejar errores
    });
    deleteModal.addEventListener('hidden.bs.modal', () => {
      invitadoSpan.textContent = '';
      deleteForm.action='';
    });


    //Enviar el formulario de crear
    let btnGuardarModal = document.getElementById("btn-guardar-modal");
    let formCrear = document.getElementById("formCrear");

    const createModal = document.getElementById('createModal');
    const nombreInput = document.getElementById('nombre');
    const metodoInput = document.getElementById('inputMethod');
    const idInput = document.getElementById('inputId');

    createModal.addEventListener('shown.bs.modal', () => {
      nombreInput.focus()
      let button = event.relatedTarget
      let id = button.getAttribute('data-bs-id')
      if (id) {
        // console.log('Mandar el id: ' + id + ' con el formulario a editar');
        let rdoBtnInv1 = document.getElementById('invitado_de1');
        let rdoBtnInv2 = document.getElementById('invitado_de2');
        let rdoBtnFam1 = document.getElementById('familia1');
        let rdoBtnFam2 = document.getElementById('familia2');
        let pasesInput = document.getElementById('numero_pases');

        const url = 'control/' + id; // URL de destino
        const options = {
          method: 'GET', // Método de solicitud (GET, POST, PUT, etc.)
          headers: {
            'Content-Type': 'application/json' // Tipo de contenido del cuerpo de la solicitud (si es necesario)
          }
        };

        fetch(url, options)
          .then(response => response.json()) // Convertir la respuesta a JSON
          .then( // Procesar los datos JSON
            // data => console.log(data)
            data => {
              nombreInput.value = data.nombre;
              if (data.invitado_de === 'lilian') {
                rdoBtnInv1.checked = true;
                rdoBtnInv2.checked = false;
              } else {
                rdoBtnInv1.checked = false;
                rdoBtnInv2.checked = true;
              }

              if (data.familia) {
                rdoBtnFam1.checked = true;
                rdoBtnFam2.checked = false;
              } else {
                rdoBtnFam1.checked = false;
                rdoBtnFam2.checked = true;
              }
              pasesInput.value = parseInt(data.numero_pases);
              formCrear.action = '/control/update';
              metodoInput.value = 'update';
              idInput.value = id;
            }
          )
          .catch(error => console.error('Error:', error)); // Manejar errores
      } else {
        formCrear.action = '/control/store';
        metodoInput.value = 'post';
      }
    })

    createModal.addEventListener('hidden.bs.modal', () => {
      nombreInput.value = '';
    });

    btnGuardarModal.addEventListener("click", function() {
      if (nombreInput.value.trim() === '') {
        appendAlert('El campo de Nombre no puede estar vacio', 'warning');
      } else {
        console.log('Lo mande a:' + formCrear.action);
        formCrear.submit();
      }
    });

    function copiarTexto(arguemetno) {
      navigator.clipboard.writeText(arguemetno)
        .then(() => {
          console.log('Texto copiado al portapapeles: ' + arguemetno);
        })
        .catch(err => {
          console.error('Error al copiar el texto:', err);
        });
    }

    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const appendAlert = (message, type) => {
      const wrapper = document.createElement('div')
      wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
      ].join('')

      alertPlaceholder.append(wrapper)
    }
  </script>
</body>

</html>