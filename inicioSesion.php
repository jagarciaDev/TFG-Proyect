<?php
$nombreApe = $_POST['nombre_apellidos'];
$usuario = $_POST['username'];
$psswd = $_POST['password'];
$email = $_POST['correo'];

$conexion = new mysqli("localhost", "root", "", "tfg");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificamos si el usuario o el correo ya existe en la base de datos
$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR correo = '$email'";
$resultado = mysqli_query($conexion, $consulta);
if (mysqli_num_rows($resultado) > 0) {
    echo "El nombre de usuario o el correo ya existe en la base de datos";
} else {
    // Insertamos los datos en la base de datos
    $consulta = "INSERT INTO usuarios (nombre_apellidos,usuario,contrasena,correo) VALUES ('$nombreApe', '$usuario','$psswd', '$email')";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        session_start();
        $_SESSION['nombre_usuario'] = $usuario; // Reemplaza "nombre de usuario" con el nombre de usuario real

        // Redirigimos al usuario a la página index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error al insertar el registro";
    }
}

// Cerramos la conexión a la base de datos
mysqli_close($conexion);