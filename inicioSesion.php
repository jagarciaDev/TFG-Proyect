<?php
$mysqli = new mysqli("localhost", "root", "", "tfg");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$usuario = $_POST['username'];
$psswd = $_POST['password'];

// Verificar si el usuario ya existe
$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$psswd'";
$resultado = mysqli_query($mysqli, $query);

if ($result->num_rows === 1) {
    // El inicio de sesión es exitoso, devolver una respuesta "success" al script JavaScript
    // Iniciar la sesión
    session_start();

    // Almacenar el ID del usuario en la sesión
    $_SESSION['usuario'];

    echo "success";
} else {
    // Error de inicio de sesión, devolver una respuesta vacía al script JavaScript
    echo "";
}