<?php
$nombreApe = $_POST['nombre_apellidos'];
$usuario = $_POST['username'];
$psswd = $_POST['password'];
$email = $_POST['correo'];

// Verificar si se subió una imagen
if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $imgData = file_get_contents($_FILES['foto']['tmp_name']);
    $base64 = base64_encode($imgData);
    $profile_picture = 'data:image/jpg;base64,' . $base64;
} else {
    $profile_picture = 'images/default_avatar.jpg';
}

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
    $consulta = "INSERT INTO usuarios (nombre_apellidos, usuario, contrasena, correo, profile_picture) 
    VALUES ('$nombreApe', '$usuario', '$psswd', '$email', '$profile_picture')";
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
