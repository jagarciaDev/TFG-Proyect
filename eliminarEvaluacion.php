<?php
include("plantillaMenu.php");

// Realizar la conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado el ID de la evaluación a eliminar
if (isset($_GET['evaluacion_id'])) {
    $evaluacion_id = $_GET['evaluacion_id'];

    // Consulta SQL para eliminar la evaluación
    $sql = "DELETE FROM tabla_evaluaciones WHERE evaluacion_id = $evaluacion_id";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<h2 class='text-success text-center'><i class='bi bi-emoji-smile-fill'></i> Se ha borrado correctamente la evaluación <i class='bi bi-emoji-smile-fill'></i></h2><br>
        
        <center><a href='misevaluaciones.php' class='btn btn-primary ms-2'>Mis evaluaciones <i class='bi bi-star-half'></i></a></center>";
    } else {
        echo "Error al eliminar la evaluación: " . $conn->error;
    }
} else {
    echo "No se ha especificado una evaluación a eliminar.";
}

// Cerrar la conexión a la base de datos
$conn->close();
