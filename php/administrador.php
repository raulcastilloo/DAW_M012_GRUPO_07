
<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion_be.php';

// Comprobar si hay una sesión activa
session_start();
if(empty($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z4Z5G9hr5Pd6h/QNhSLz9v8aGF5g4+mq0St2fO" crossorigin="anonymous">
    <title>Administrador</title>
</head>
<body>
<h1>Bienvenido admin</h1>
<!-- mostrar datos-->
<div class="espacio-tabla">
<table class="table table-dark table-striped-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nombre_completo</th>
            <th scope="col">correo</th>
            <th scope="col">usuario</th>
            <th scope="col">rol</th>
            <th scope="col">acciones</th>
        </tr>
    </thead> 
</body>

<?php

   $sql="SELECT * FROM usuarios";
   $result = mysqli_query($conexion, $sql);

   while($mostrar = mysqli_fetch_array($result)){

   }

?>
   <tr>
       <td><?php echo $mostrar['id'] ?></th>
       <td><?php echo $mostrar['nombre_completo'] ?></th>
       <td><?php echo $mostrar['correo'] ?></th>
       <td><?php echo $mostrar['usuario'] ?></th>
       <td><?php echo $mostrar['rol'] ?></th>
       <td><button class="btn btn-success" type="submit">Editar</button>
       <td><button class="btn btn-danger" type="submit">Eliminar</button>
    </tr>

</html>


