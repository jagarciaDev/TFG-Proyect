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

if (isset($_GET['frontstage']) && isset($_GET['gradageneral']) && isset($_GET['anfiteatro'])) {
    $frontstage = $_GET['frontstage'];
    $gradageneral = $_GET['gradageneral'];
    $anfiteatro = $_GET['anfiteatro'];

    $pdf = new PDF();

    // Generar las páginas para select1
    for ($i = 1; $i <= $frontstage; $i++) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada para select1', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Descripción de la entrada para select1: ' . $i, 0, 1, 'C');
    }

    // Generar las páginas para select2
    for ($i = 1; $i <= $gradageneral; $i++) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada para select2', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Descripción de la entrada para select2: ' . $i, 0, 1, 'C');
    }

    // Generar las páginas para select3
    for ($i = 1; $i <= $anfiteatro; $i++) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada para select3', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Descripción de la entrada para select3: ' . $i, 0, 1, 'C');
    }

    // Generar el archivo PDF
    $pdf->Output('entradas.pdf', 'D');
}
