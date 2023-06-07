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

    // Ejemplo de conexión y consulta en MySQLi utilizando consultas preparadas
    $conexion = new mysqli("localhost", "root", "", "tfg");
    $query = "INSERT INTO gira (fecha, lugar, foto) VALUES (?, ?, ?)";
    $statement = $conexion->prepare($query);
    $statement->bind_param("sss", $fechaConcierto, $nombreConcierto, $imagenContenido);
    $resultado = $statement->execute();

    // Verificar si la inserción fue exitosa
    if ($resultado) {
        header("Location: pagina_administrador.php");
        exit;
    } else {
        echo "Error al insertar los datos: " . $statement->error;
    }

    $statement->close();
    $conexion->close();
} else {
    echo "No se ha subido una imagen válida.";
}
