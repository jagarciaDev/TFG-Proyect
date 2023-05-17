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

    // Verificar si la carpeta no existe y crearla
    if (!file_exists($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }

    $rutaArchivo = $carpetaDestino . $nombreArchivo;

    if (move_uploaded_file($archivo, $rutaArchivo)) {

        // Conectamos con la base de datos
        $servidor = 'localhost';
        $usuario = 'root';
        $password = '';
        $baseDatos = 'tfg';

        $conexion = mysqli_connect($servidor, $usuario, $password, $baseDatos);

        // Verificamos la conexión a la base de datos
        if (!$conexion) {
            die("Error al conectar con la base de datos: " . mysqli_connect_error());
        }

        // Obtenemos el ID del usuario actualmente conectado
        $id_usuario = $_SESSION['id'];

        // Actualizamos la información del usuario en la base de datos
        $query = "UPDATE usuarios SET profile_picture = '$rutaArchivo' WHERE id_usuario = '$id_usuario'";

        if (mysqli_query($conexion, $query)) {
            header("Location: miperfil.php");
        } else {
            echo "Error al actualizar la foto de perfil: " . mysqli_error($conexion);
        }

        mysqli_close($conexion);
    } else {
        echo "Error al subir el archivo.";
    }
}
