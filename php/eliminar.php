<?php
include 'conexion_be.php';

$id = $_GET['id'];

$query = mysqli_query($conexion, "DELETE FROM usuarios WHERE id = $id");

if($query){
   header("HTTP/1.1 200 OK");
} else {
   header("HTTP/1.1 501 Server Error");
}

mysqli_close($conexion);