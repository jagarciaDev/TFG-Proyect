<?php
session_start();

$servername = "localhost";
$username = "id20905691_root";
$passwordbd = "javiTFG123@@";
$dbname = "id20905691_tfg";

$usuario = $_POST["username"];
$password = $_POST["password"];

// Crea la conexión a la base de datos
$conn = new mysqli($servername, $username, $passwordbd, $dbname);

// Verifica si se ha producido un error en la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Consulta para comprobar si el usuario y contraseña son válidos
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$password'";
$result = $conn->query($sql);

// Si se encontró un resultado, inicia sesión y redirige al usuario a la página de inicio
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["id"] = $row["id_usuario"];
    $_SESSION["nombre"] = $row["nombre_apellidos"];
    $_SESSION["nombre_usuario"] = $row["usuario"];
    $_SESSION["passwd"] = $row["contrasena"];
    $_SESSION["correoelec"] = $row["correo"];
    $_SESSION["fotoperfil"] = $row["profile_picture"];

    // Verifica si el usuario es administrador
    if ($row["usuario"] == "admin") {
        header("Location: pagina_administrador.php");
    } else {
        header("Location: index.php");
    }
} else {
    echo '<script>alert("El usuario y/o la contraseña son incorrectos.");</script>';
    header("Location: login.php");
}

$conn->close();
