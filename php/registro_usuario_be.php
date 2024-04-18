<?php

   include 'conexion_be.php';
 
   $nombre_completo = $_POST['nombre_completo'];
   $correo = $_POST['correo'];
   $usuario = $_POST['usuario'];
   $contrasena = $_POST['contrasena']; 

   //encriptar contraseña 
   $contrasena = hash('sha512', $contrasena);

   //Asignar un valor preterminado al rol (cliente)
   $rol_preterminado = 2; //cliente

   $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena, rol)
             VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena', $rol_preterminado)";
    
    //que no se repitan los emails en la base de datos

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
           <script>
               alert("Este correo ya esta registrado, intente usar otra");
               window.location = "../index.php";
           </script>
        ';
        exit();
    }

    //verificar que no se repita el usuario

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
           <script>
               alert("Este usuario ya esta en uso, intente usar otro");
               window.location = "../index.php";
           </script>
        ';
        exit();
    }

   $ejecutar = mysqli_query($conexion, $query);
   if($ejecutar){
    echo '
        <script>
            alert("Usuario almacenado exitosamente");
            window.location = "../index.php";
        </script>    
   ';

   }else{
       echo '
          <script>
             alert("El usuario no se ha registrado, intentelo de nuevo");
             window.location = "../index.php";
          
          </script>
       
       ';
   }
   
   mysqli_close($conexion);

?>