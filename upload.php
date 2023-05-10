<?php
session_start(); // Iniciamos la sesión

if (isset($_FILES['fileToUpload'])) {

    // Archivo temporal
    $archivo = $_FILES['fileToUpload']['tmp_name'];

    // Obtenemos la información del archivo
    $nombreArchivo = $_FILES['fileToUpload']['name'];
    $tipoArchivo = $_FILES['fileToUpload']['type'];
    $tamanoArchivo = $_FILES['fileToUpload']['size'];

    // Movemos el archivo a una carpeta en el servidor
    $carpetaDestino = 'uploads/';
    $rutaArchivo = $carpetaDestino . $nombreArchivo;

    move_uploaded_file($archivo, $rutaArchivo);

    // Conectamos con la base de datos
    $servidor = 'localhost';
    $usuario = 'root';
    $password = '';
    $baseDatos = 'tfg';

    $conexion = mysqli_connect($servidor, $usuario, $password, $baseDatos);

    // Obtenemos el ID del usuario actualmente conectado
    $id_usuario = $_SESSION['id_usuario'];

    // Actualizamos la información del usuario en la base de datos
    $query = "UPDATE usuarios SET foto_perfil = '$rutaArchivo' WHERE id_usuario = '$id_usuario'";

    mysqli_query($conexion, $query);

    mysqli_close($conexion);

    echo "El archivo se ha subido correctamente.";
}
