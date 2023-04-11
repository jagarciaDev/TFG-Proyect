<?php
session_start();

// Nos conectamos a la base de datos
$conexion = new mysqli("localhost", "root", "", "tfg");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$usuario = $_POST['username'];
$psswd = $_POST['password'];

// Verificamos si el usuario existe en la base de datos
$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$psswd'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    // Si el usuario existe, creamos la sesión y redirigimos al usuario al index.php
    $_SESSION['username'] = $usuario;
    header("Location: index.php");
    exit();
}

// Si el usuario no existe, mostramos un mensaje de error
echo "Datos de inicio de sesión incorrectos";

// Cerramos la conexión a la base de datos
mysqli_close($conexion);
