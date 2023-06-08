<?php
include("plantillaMenu.php");
// Insertar el pedido en la base de datos
$idUsuario = $_SESSION['id'];
$idConcierto = $_POST['idConcierto'];

// Obtener el número de páginas para cada opción seleccionada
$num_pags_select1 = $_POST['select1'];
$num_pags_select2 = $_POST['select2'];
$num_pags_select3 = $_POST['select3'];

$precio_entrada = $_POST['precio_entrada1'];

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$query = "SELECT lugar, fecha FROM gira WHERE id='$idConcierto'";
$result = mysqli_query($conn, $query);

// Verificar si la consulta fue exitosa
if ($result) {
    // Obtener el primer registro de la consulta
    $row = mysqli_fetch_assoc($result);

    // Asignar los valores a las variables correspondientes
    $lugar = $row['lugar'];
    $fecha = $row['fecha'];

    // Liberar los recursos del resultado
    mysqli_free_result($result);
} else {
    // Manejo del error en caso de que la consulta falle
    echo "Error al obtener los datos de lugar y fecha: " . mysqli_error($conn);
}


// Consulta SQL para insertar el pedido
$sql = "INSERT INTO entradasconciertos (id_usuario, id_gira, lugar, fecha, frontstage, gradageneral, anfiteatro) 
    VALUES ($idUsuario, $idConcierto, '$lugar', '$fecha', '$num_pags_select1', '$num_pags_select2', '$num_pags_select3')";

if ($conn->query($sql) === TRUE) {
    echo "<br><center><h3 class='text-success'>El pedido se ha guardado correctamente.</h3>";
    echo "<br><center>";
    echo "<a href='index.php' class='btn btn-secondary me-2'>Ir a inicio <i class='bi bi-door-open-fill'></i></a>";
    echo "<a href='misentradas.php' class='btn btn-primary ms-2'>Mis entradas <i class='bi bi-ticket-fill'></i></a>";
    echo "</center>";
} else {
    echo "<center><h3 class='text-danger'>Error al guardar el pedido: " . $conn->error . "</h3></center>";
}

$conn->close();
