<?php

// Recibimos los datos del formulario
$nombreApe = $_POST['nombre_apellidos'];
$usuario = $_POST['username'];
$psswd = $_POST['password'];
$email = $_POST['correo'];

// Nos conectamos a la base de datos
$conexion  = new mysqli("localhost", "root", "", "tfg");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificamos si el usuario ya existe en la base de datos
$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$resultado = mysqli_query($conexion, $consulta);
if (mysqli_num_rows($resultado) > 0) {
    echo "El nombre de usuario ya existe en la base de datos";
} else {
    // Insertamos los datos en la base de datos
    $consulta = "INSERT INTO usuarios (nombre_apellidos,usuario,contrasena,correo) VALUES ('$nombreApe', '$usuario', '$psswd', '$email')";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        session_start();
        $_SESSION['username'] = "nombre de usuario"; // Reemplaza "nombre de usuario" con el nombre de usuario real
        header("Location: index.php");
    } else {
        echo "Error al insertar el registro";
    }
}

// Cerramos la conexión a la base de datos
mysqli_close($conexion);