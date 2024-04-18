<?php
   session_start();

   include 'conexion_be.php';

   if(!isset($_SESSION['usuario'])) {
    header("Location: ../auth.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('../assets/img/IMG-PRINCIPAL.jpg'); /* Ruta a tu imagen de fondo */
            background-size: cover;
            background-position: center;
            color: Black; /* Color de texto */
            font-family: Arial, sans-serif; /* Fuente del texto */
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center; /* Centra el título */
            font-size: 48px; /* Tamaño de fuente del título */
            text-transform: uppercase; /* Convierte el texto en mayúsculas */
            letter-spacing: 2px; /* Espaciado entre letras */
        }
    </style>
    <title>Gestión de usuarios</title>
  </head>
  <body>
    <h1>Gestión de datos de alumnos</h1>

    <div class="container">
       <table class="table table-dark table-striped-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Rol</th>
                    <?php if($_SESSION['usuario']['rol'] == 1):  ?>
                    <th scope="col">Acciones</th>
                    <?php endif; ?>
                </tr>
            </thead> 
            <tbdoy>
        <?php
        $sql="SELECT * FROM usuarios";
        $result = mysqli_query($conexion, $sql);

        while($row = mysqli_fetch_array($result)):   ?>
             <tr>
                <td><?php echo $row['id'] ?></th>
                <td><?php echo $row['nombre_completo'] ?></th>
                <td><?php echo $row['correo'] ?></th>
                <td><?php echo $row['usuario'] ?></th>
                <td><?php echo $row['rol'] == 1 ? 'Administrador' : "Usuario" ?></th>
                 <?php if($_SESSION['usuario']['rol'] == 1):  ?>
                  <td>
                      <button 
                      type="button" 
                      class="btn btn-success" 
                      data-bs-toggle="modal" 
                      data-bs-target="#modal" 
                      data-id="<?php echo $row['id']  ?>" 
                      data-nombre-completo="<?php echo $row['nombre_completo']  ?>"
                      data-correo="<?php echo $row['correo']  ?>"
                      >
                        Editar
                      </button>
                      <?php if($row['id'] != $_SESSION['usuario']['id']):  ?>
                        <a href="eliminar.php?id=<?php echo $row['id']  ?>" class="btn btn-danger" type="submit">Eliminar</a>
                      <?php endif; ?>
                  </td>
                 <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </tbody>
        </table>

        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form name="update-info" class="modal-content">
               <input type="hidden" class="form-control" id="id" name="id">
              <div class="modal-header">
                <h5 class="modal-title">Editar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="name" class="form-label">Nombre completo</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                 <div class="mb-3">
                  <label for="email" class="form-label">Correo</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
          </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      const buttons = document.querySelectorAll('[data-bs-toggle="modal"]')

      const modal = document.querySelector('#modal')
      
      buttons.forEach(button => button.addEventListener('click', ({ currentTarget }) => {
        modal.querySelector('#id').value = currentTarget.dataset.id;
        modal.querySelector('#name').value = currentTarget.dataset.nombreCompleto;
        modal.querySelector('#email').value = currentTarget.dataset.correo;
      }))

      const form = document.forms['update-info']

      form.addEventListener('submit', async (event) => {
          event.preventDefault();
          const data = {
            id: form.querySelector('#id').value,
            nombreCompleto: form.querySelector('#name').value,
            correo: form.querySelector('#email').value
          }
          await updateUser(data)
      })

      async function updateUser(req) {
        const res = await fetch('editar.php', {
          method: 'POST',
          body: JSON.stringify(req)
        })
        const data = await res.text();

        if(res.status === 200) {
          alert('Usuario modificado correctamente!')
        } else {
          alert('Ha ocurrido un error al modificar!')
        }
      }
    </script>
  </body>
</html>