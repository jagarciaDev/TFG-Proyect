<?php
$nombreApe = $_POST['nombre_apellidos'];
$usuario = $_POST['username'];
$psswd = $_POST['password'];
$email = $_POST['correo'];
$imagenPerfil = $_FILES['foto_perfil']['tmp_name'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "id20905691_root", "javiTFG123@@", "id20905691_tfg");
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
    if (!empty($imagenPerfil)) {
        $imagenData = addslashes(file_get_contents($imagenPerfil)); // Obtener el contenido de la imagen
    } else {
        $imagenesPorDefecto = array(
            "images\picprofile\profileM1.jpg",
            "images\picprofile\profileM2.jpg",
            "images\picprofile\profileM3.jpg",
            "images\picprofile\profileM4.jpg",
            "images\picprofile\profileM5.jpg"
        );
        $imagenAleatoria = $imagenesPorDefecto[array_rand($imagenesPorDefecto)]; // Obtener una imagen aleatoria del array

        $imagenData = addslashes(file_get_contents($imagenAleatoria)); // Obtener el contenido de la imagen por defecto
    }

    $consulta = "INSERT INTO usuarios (nombre_apellidos, usuario, contrasena, correo, profile_picture) 
    VALUES ('$nombreApe', '$usuario', '$psswd', '$email', '$imagenData')";
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
