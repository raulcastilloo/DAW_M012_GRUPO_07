//Ejecutando funciones
document.getElementById("btn_iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn_registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario__login = document.querySelector(".formulario_login");
var formulario__register = document.querySelector(".formulario_register");
var contenedor__login_register = document.querySelector(".contenedor_login-register");
var caja_trasera__login = document.querySelector(".caja_trasera-login");
var caja_trasera__register = document.querySelector(".caja_trasera-register");

    //FUNCIONES

function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera__register.style.display = "block";
        caja_trasera__login.style.display = "block";
    }else{
        caja_trasera__register.style.display = "block";
        caja_trasera__register.style.opacity = "1";
        caja_trasera__login.style.display = "none";
        formulario__login.style.display = "block";
        contenedor__login_register.style.left = "0px";
        formulario__register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario__login.style.display = "block";
            contenedor__login_register.style.left = "10px";
            formulario__register.style.display = "none";
            caja_trasera__register.style.opacity = "1";
            caja_trasera__login.style.opacity = "0";
        }else{
            formulario__login.style.display = "block";
            contenedor__login_register.style.left = "0px";
            formulario__register.style.display = "none";
            caja_trasera__register.style.display = "block";
            caja_trasera__login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario__register.style.display = "block";
            contenedor__login_register.style.left = "410px";
            formulario__login.style.display = "none";
            caja_trasera__register.style.opacity = "0";
            caja_trasera__login.style.opacity = "1";
        }else{
            formulario__register.style.display = "block";
            contenedor__login_register.style.left = "0px";
            formulario__login.style.display = "none";
            caja_trasera__register.style.display = "none";
            caja_trasera__login.style.display = "block";
            caja_trasera__login.style.opacity = "1";
        }
}