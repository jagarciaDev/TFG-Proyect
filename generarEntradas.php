<?php
header('Content-Type: text/html; charset=utf-8');
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Función para agregar el pie de página
    function Footer()
    {
        // Establecer la fuente y tamaño de letra
        $this->SetFont('Helvetica', '', 8);

        // Mover el cursor a 1.5 cm por encima del borde inferior de la página
        $this->SetY(-50);

        // Agregar una caja con fondo gris claro
        $this->SetFillColor(225, 225, 225);
        $this->Rect(10, 245, 190, 50, 'F');

        // Agregar las normas del concierto
        $this->Cell(0, 10, 'Normas del concierto:', 0, 1, 'C');
        $this->Cell(0, 10, '1. Prohibido el ingreso de bebidas alcohólicas.', 0, 1, 'C');
        $this->Cell(0, 10, '2. No se permite el ingreso con alimentos.', 0, 1, 'C');
        $this->Cell(0, 10, '3. El ingreso a la zona del escenario está prohibido.', 0, 1, 'C');
    }
}

if (isset($_POST['select1']) && isset($_POST['select2']) && isset($_POST['select3']) && isset($_POST['precio_entrada1'])) {
    // Obtener el número de páginas para cada opción seleccionada
    $num_pags_select1 = $_POST['select1'];
    $num_pags_select2 = $_POST['select2'];
    $num_pags_select3 = $_POST['select3'];

    $precio_entrada = $_POST['precio_entrada1'];

    $pdf = new PDF();

    // Generar las páginas para select1
    for ($i = 1; $i <= $num_pags_select1; $i++) {
        $pdf->AddPage();
        // $pdf->Image('images\9469-MELENDI.jpg', 57, 50, 100);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada número: ' . $i, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Precio: ' . $precio_entrada . ' euros', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Descripción de la entrada para select1', 0, 1, 'C');
    }

    // Generar las páginas para select2
    for ($i = 1; $i <= $num_pags_select2; $i++) {
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada número: ' . $i, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Descripción de la entrada para select2', 0, 1, 'C');
    }

    // Generar las páginas para select3
    for ($i = 1; $i <= $num_pags_select3; $i++) {
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada número: ' . $i, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Descripción de la entrada para select3', 0, 1, 'C');
    }

    include("plantillaMenu.php");
    // Insertar el pedido en la base de datos
    $idUsuario = $_SESSION['id'];
    $idConcierto = $_POST['idConcierto'];

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
        echo "El pedido se ha guardado correctamente.";
    } else {
        echo "Error al guardar el pedido: " . $conn->error;
    }

    $conn->close();

    $pdf->Output();
} else {
    echo "Error: Los campos no están definidos correctamente.";
}
