<?php
// Iniciamos la sesión
session_start();

// Nos conectamos a la base de datos
$conexion = new mysqli("localhost", "root", "", "tfg");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtenemos los valores del usuario y la contraseña desde el formulario de inicio de sesión
$usuario = $_POST['username'];
$psswd = $_POST['password'];

// Preparamos una consulta segura para evitar inyección de SQL
// Nota: Usamos marcadores de posición "?" en lugar de interpolar directamente los valores de las variables en la consulta.
$consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=? AND contrasena=?");
$consulta->bind_param("ss", $usuario, $psswd);
$consulta->execute();
$resultado = $consulta->get_result();

// Verificamos si la consulta retornó algún resultado
if ($resultado->num_rows > 0) {
    // Si el usuario existe, creamos la sesión y redirigimos al usuario al index.php
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $usuario;
} else {
    // Si el usuario no existe, mostramos un mensaje de error
    echo "Datos de inicio de sesión incorrectos";
}

// Cerramos la conexión a la base de datos
$conexion->close();
