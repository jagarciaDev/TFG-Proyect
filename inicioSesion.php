<?php
$nombreApe = $_POST['nombre_apellidos'];
$usuario = $_POST['username'];
$psswd = $_POST['password'];
$email = $_POST['correo'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tfg");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificamos si el usuario o el correo ya existe en la base de datos
$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR correo = '$email'";
$resultado = mysqli_query($conexion, $consulta);
if (mysqli_num_rows($resultado) > 0) {
    echo "El nombre de usuario o el correo ya existe en la base de datos";
} else {
    // Insertamos los datos en la base de datos
    $consulta = "INSERT INTO usuarios (nombre_apellidos, usuario, contrasena, correo) 
    VALUES ('$nombreApe', '$usuario', '$psswd', '$email')";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        // Redirigimos al usuario a la página de inicio de sesión
        header("Location: login.php");
        exit();
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conexion);
    }
}

// Cerramos la conexión a la base de datos
mysqli_close($conexion);
