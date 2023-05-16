<?php
$nombreConcierto = $_POST['concertName'];
$fechaConcierto = DateTime::createFromFormat('Y-m-d', $_POST['concertDate'])->format('Y-m-d');

// Establecer la zona horaria
date_default_timezone_set('Europe/Madrid');

// Realizar la inserción en la base de datos con los datos recibidos

// Ejemplo de conexión y consulta en MySQLi
$conexion = new mysqli("localhost", "root", "", "tfg");
$query = "INSERT INTO gira (fecha, lugar) VALUES ('$fechaConcierto', '$nombreConcierto')";
$resultado = $conexion->query($query);

// Verificar si la inserción fue exitosa
if ($resultado) {
    header("Location: pagina_administrador.php");
    exit;
} else {
    echo "Error al insertar los datos: " . $conexion->error;
}

$conexion->close();
