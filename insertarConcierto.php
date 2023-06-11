<?php
$nombreConcierto = $_POST['concertName'];
$fechaConcierto = DateTime::createFromFormat('Y-m-d', $_POST['concertDate'])->format('Y-m-d');
$imagenConcierto = $_FILES['imagen']['tmp_name'];

// Establecer la zona horaria
date_default_timezone_set('Europe/Madrid');

// Verificar que se haya subido una imagen
if (!empty($imagenConcierto) && is_uploaded_file($imagenConcierto)) {
    // Obtener contenido binario de la imagen
    $imagenContenido = file_get_contents($imagenConcierto);
} else {
    // Ruta de la imagen predeterminada
    $imagenPredeterminada = "images/concierto/conciertoPredeterminada.png";

    // Obtener contenido binario de la imagen predeterminada
    $imagenContenido = file_get_contents($imagenPredeterminada);
}

// Ejemplo de conexión y consulta en MySQLi utilizando consultas preparadas
$conexion = new mysqli("localhost", "root", "", "tfg");

// Verificar si ya existe un concierto en la misma fecha
$queryVerificar = "SELECT * FROM gira WHERE fecha = ?";
$statementVerificar = $conexion->prepare($queryVerificar);
$statementVerificar->bind_param("s", $fechaConcierto);
$statementVerificar->execute();
$resultadoVerificar = $statementVerificar->get_result();

if ($resultadoVerificar->num_rows > 0) {
    // Ya existe un concierto en la misma fecha, mostrar mensaje de error o redireccionar a otra página
    echo "Ya existe un concierto en la misma fecha.";
    exit;
}

// Realizar la inserción del nuevo concierto
$queryInsertar = "INSERT INTO gira (fecha, lugar, foto) VALUES (?, ?, ?)";
$statementInsertar = $conexion->prepare($queryInsertar);
$statementInsertar->bind_param("sss", $fechaConcierto, $nombreConcierto, $imagenContenido);
$resultadoInsertar = $statementInsertar->execute();

// Verificar si la inserción fue exitosa
if ($resultadoInsertar) {
    header("Location: pagina_administrador.php");
    exit;
} else {
    echo "Error al insertar los datos: " . $statementInsertar->error;
}

$statementVerificar->close();
$statementInsertar->close();
$conexion->close();
