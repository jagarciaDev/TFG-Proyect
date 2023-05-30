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

    $pdf->Output();
} else {
    echo "Error: Los campos no están definidos correctamente.";
}
