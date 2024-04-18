<!--PÁGINA PRINCIPAL -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO FINAL</title>
    <!--Enlace GoogleFont -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="index.css">    <!--Enlace css -->

</head>
<body>
   
                
    <header>
                    <!--ANIMACION NAV -->

                 <ul class="circles">
                         <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                </ul>


            <img src="img/logo-academia.png" class="logo-titulo">
     
        <nav>
            
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Prueba de nivel</a></li>
                <?php if(!isset($_SESSION['usuario'])): ?>
                    <li><div class="login"><a href="auth.php">Login</a></div></li>
                <?php else: ?>
                    <li>
                        <a href="php/gestion.php">
                            <?php echo $_SESSION['usuario']['nombre_completo']; ?>
                        </a>
                    </li>
                    <li><div class="login"><a href="php/cerrar_sesion.php">Logout</a></div></li>
                <?php endif ?>
           
        </nav>

    </header>
        <!--Zona principal -->
    <section class="zona1"></section> 
 
    
        <script type="text/javascript">
            window.addEventListener("scroll", function(){
                var header = document.querySelector("header");
                header.classList.toggle("abajo",window.scrollY>0);
            })
        </script>

<div class="titulo-servicios"><h2>OUR SERVICES</h2></div>


<div class="contenedor-servicios">
    <div class="servicio">
        <h3><a href="FaceToFace.html">Face to Face Classes</a></h3>
        <img src="img/icon-face-to-face.png" class="icon-face-to-face">
        <p>Ofrecemos clases presenciales diseñadas para proporcionar a nuestros estudiantes una experiencia de aprendizaje inmersiva y personalizada,
             en un ambiente de enseñanza enriquecedor y participativo.</p>
    </div>
    <div class="servicio">
        <h3><a href="OnlineClasses.html">Online Classes</a></h3>
        <img src="img/icon-online-classes.png" class="icon-online-classes">
        <p>Nuestras clases en línea ofrecen flexibilidad para aquellos que prefieren aprender desde la 
            comodidad de su hogar, adaptándose a sus horarios y necesidades.</p>
    </div>
    <div class="servicio">
        <h3><a href="OnlineCourse.html">Online Courses</a></h3>
        <img src="img/icon-online-courses.png" class="icon-online-courses">
        <p>Ofrecemos un curso intensivo en línea para los niveles B1, B2 y C, así como preparación específica para el examen Aptis en los niveles B1 y B2.</p>
    </div>
</div>


<script type="text/javascript">
    window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle("abajo",window.scrollY>0);
    })
</script>


<div class="titulo-servicios"><h3>ACADEMY'S PRESENTATION VIDEO </h3></div>
<div class="video-container">
    <iframe width="560" height="315"
     src="https://www.youtube.com/embed/0Xm1pqbfk1A?si=c0MpfAebj-txrX7A" 
     title="YouTube video player" frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>

    <!--Preguntas-->

<div class="titulo-servicios"><h4>FAQs</h4></div>
<div class="preguntas">

    <div class="contenedor-preguntas activo">
        <div class="contenedor-pregunta">
            <p class="pregunta">¿Cuál es el método de enseñanza utilizado en la academia de inglés?<img src="./img/icon-faqs.png" alt="Abrir Respuesta" /></p>
            <p class="respuesta">Trabajamos de tres maneras diferentes, una con clases presenciales,
                 otra con clases face to face pero de manera online, y una tercera forma a través de nuestra plataforma innovadora</p>
        </div>    
        <div class="contenedor-pregunta">
            <p class="pregunta">¿Qué tipo de certificación o acreditación ofrece la academia al completar un curso?<img src="./img/icon-faqs.png" alt="Abrir Respuesta" /></p>
            <p class="respuesta">Todos los certificados oficiales emitidos por Aptis y la Universidad de Trinity Colleage London</p>
        </div>    
    
   
        <div class="contenedor-pregunta">
            <p class="pregunta">¿Cuáles son las opciones de horarios disponibles?<img src="./img/icon-faqs.png" alt="Abrir Respuesta" /></p>
            <p class="respuesta">Esto no es ningún tipo de problema gracias a nuestra plataforma innovadora, donde tu mismo sigues tu propios 
                ritmo de trabajo y además cuentas con un profesor individualizado para resolver todo tipo de dudas y sugerencias
            </p>
        </div>
        
            <div class="contenedor-pregunta">
                <p class="pregunta">¿Cómo se evalúa el progreso del estudiante durante el curso?<img src="./img/icon-faqs.png" alt="Abrir Respuesta" /></p>
                <p class="respuesta">Gracias a nuestra plaforma y las actividades que se mandan al profesor,
                     se sigue un modelo totalmente individualizado con cada alumno</p>
            
            </div> 
    </div>
</div>

<script>

    const preguntas = document.querySelectorAll('.preguntas .contenedor-pregunta');
    preguntas.forEach((pregunta) => {
        pregunta.addEventListener('click', (e) => {
            e.currentTarget.classList.toggle('activa');
    
            const respuesta = pregunta.querySelector('.respuesta');
            const alturaRealRespuesta = respuesta.scrollHeight;
            
            if(!respuesta.style.maxHeight){
       
                respuesta.style.maxHeight = alturaRealRespuesta + 'px';
            } else {
                respuesta.style.maxHeight = null;
            }
    
   
            preguntas.forEach((elemento) => {
                if(pregunta !== elemento){
                    elemento.classList.remove('activa');
                    elemento.querySelector('.respuesta').style.maxHeight = null;
                }
            });
    
    
        });
    });
    </script>



<footer>


    <p>&copy; 2024 English Club Los Molares. Todos los derechos reservados.</p>



    
    <a href="ejemplo.html" >
        <img src="img/icon-fb.png"  alt="Instagram Logo" width=40px >
    </a>
    <a href="ejemplo.html">
        <img src="img/icon-instagram.png" alt="Twitter Logo"width=40px >
    </a>
    <a href="ejemplo.html" >
        <img src="img/icon-x.png"  alt="Facebook Logo"width=40px >
    </a>
    <a href="ejemplo.html">
        <img src="img/icon-yt.png"  alt="YouTube Logo"width=40px >
    </a>
    <a href="ejemplo.html">
        <img src="img/icon-gmail.png"  alt="Gmail Logo"width=40px >
    </a>
    <a href="ejemplo.html">
        <img src="img/icon-telefono.png" class="telf" alt="telf logo"width=40px >
    </a>

</footer>



</body>

</html>