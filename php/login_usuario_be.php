<?php
   session_start();

   include 'conexion_be.php';
   // Declaramos las variables
   $correo = $_POST['correo'];
   $contrasena = $_POST['contrasena'];
   $contrasena = hash('sha512', $contrasena);

   // Creamos una funcion de validar los datos de la base y acceder a la sesion
   $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'");


   $_SESSION['usuario'] = $query->fetch_assoc();

    header("location: ../index.php");