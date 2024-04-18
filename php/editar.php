<?php
include 'conexion_be.php';

$post = file_get_contents('php://input');
$data = json_decode($post, true);

$id = $data['id'];
$nombre_completo = $data['nombreCompleto'];
$correo = $data['correo'];

$query = mysqli_query($conexion, "UPDATE usuarios SET nombre_completo = '$nombre_completo', correo = '$correo' WHERE id = $id");

if($query) {
    // send http success
} else {
    // send http error
}

mysqli_close($conexion);
?>
