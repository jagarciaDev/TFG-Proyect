<?php
session_start();
$usuario_actual = $_SESSION['id'];
$imagenPerfil = $_FILES['imagen']['tmp_name'];
$imagenData = addslashes(file_get_contents($imagenPerfil)); // Obtener el contenido de la imagen

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tfg");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Actualiza la imagen de perfil en la base de datos para el usuario actual
$consulta = "UPDATE usuarios SET profile_picture = '$imagenData' WHERE usuario = '$usuario_actual'";
$resultado = mysqli_query($conexion, $consulta);
if ($resultado) {
    // La actualización se realizó correctamente
    mysqli_close($conexion);
    header("Location: miperfil.php");
    exit();
} else {
    // Hubo un error al actualizar la imagen de perfil
    echo "Error al actualizar la imagen de perfil: " . mysqli_error($conexion);
    mysqli_close($conexion);
}
