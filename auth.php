<?php
   
   session_start();

   if(isset($_SESSION['usuario'])){
    header("location: index.php");
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y registro</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <main>

        <div class="contenedor_todo">
            <div class="caja_trasera">
                <div class="caja_trasera-login">
                   <h3>¿Ya tienes una cuenta?</h3>
                   <p>Inicia sesión para entrar al campus</p>
                   <button id="btn_iniciar-sesion">Iniciar Sesión</button>
            </div>
               <div class="caja_trasera-register">
                   <h3>¿Aún no tienes una cuenta?</h3>
                   <p>Registrate para que puedas iniciar sesión</p>
                   <button id="btn_registrarse">Registrarse</button>
               </div>
            </div>

            <div class="contenedor_login-register">
                <!--Login-->
                <form action="php/login_usuario_be.php" method="POST" 
                class="formulario_login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="correo">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Entrar</button>
                </form>

                <!--Register-->
                <form action="php/registro_usuario_be.php" method="POST" class="formulario_register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo"> 
                    <input type="text" placeholder="Correo Electronico" name="correo">
                    <input type="text" placeholder="Usuario" name="usuario">
                    <input type="password" placeholder="Contraseña" name="contrasena"><!--<br><br>
                    <select name="rol"><option value="1">Administrador</option><option value="2">Cliente</option></select><br>-->
                    <button>Registrarse</button>
                </form>
            </div>

        </div>
    </main>

    <script src="assets/js/script.js"></script>
    
</body>
</html>