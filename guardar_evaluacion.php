<?php
// Verificar si hay una sesión activa
session_start();
if (!isset($_SESSION['id'])) {
    die("Error: No se ha iniciado sesión.");
}

// Recuperar el valor seleccionado por el usuario
$estrellas = $_POST['estrellas'];
$nombredisco = $_POST['nombre_disco'];

// Obtener el ID del usuario de la sesión
$usuario_id = $_SESSION['id'];

// Conectarse a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "id20905691_root";
$password = "javiTFG123@@";
$dbname = "id20905691_tfg";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Verificar si ya existe una evaluación para el usuario y el disco
$sql_verificar = "SELECT * FROM tabla_evaluaciones WHERE id_usuario = '$usuario_id' AND nombre_disco = '$nombredisco'";
$resultado_verificar = $conn->query($sql_verificar);

if ($resultado_verificar->num_rows > 0) {
    // Ya existe una evaluación para ese usuario y ese disco
    header("Location: falloevaluaciones.php");
    exit;
}

// Insertar el valor seleccionado en la base de datos junto con el ID del usuario
$sql_insertar = "INSERT INTO tabla_evaluaciones (estrellas, id_usuario, nombre_disco) VALUES ('$estrellas', '$usuario_id', '$nombredisco')";

if ($conn->query($sql_insertar) === TRUE) {
    header("Location: discografia.php");
} else {
    echo "Error al guardar la evaluación en la base de datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
