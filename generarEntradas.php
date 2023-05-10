<?php
header('Content-Type: text/html; charset=utf-8');

$num_pags = $_POST['select1'];

require('fpdf/fpdf.php');

class PDF extends FPDF
{

    // Función para agregar el footer
    function Footer()
    {
        // Establece la fuente y tamaño de letra
        $this->SetFont('Helvetica', '', 8);

        // Mueve el cursor a 1,5 cm del borde inferior de la página
        $this->SetY(-50);

        // Agrega una caja con fondo gris claro
        $this->SetFillColor(225, 225, 225);
        $this->Rect(10, 245, 190, 50, 'F');

        // Agrega las normas
        $this->Cell(0, 10, 'Normas del concierto:', 0, 1, 'C');
        $this->Cell(0, 10, '1. Prohibido el ingreso de bebidas alcoholicas.', 0, 1, 'C');
        $this->Cell(0, 10, '2. No se permite el ingreso con alimentos.', 0, 1, 'C');
        $this->Cell(0, 10, '3. El ingreso a la zona del escenario esta prohibido.', 0, 1, 'C');
    }
}

$pdf = new PDF();

for ($i = 1; $i <= $num_pags; $i++) {
    $pdf->AddPage();
    $pdf->Image('images/disco11.jpg', 57, 50, 100);

    $pdf->AddFont('Helvetica', '', 'helvetica.php', true);
    $pdf->SetFont('helvetica', 'B', 16);

    $pdf->Cell(0, 20, 'Entrada numero: ' . $i, 0, 1, 'C');
    $pdf->Cell(0, 10, 'Melendi presenta su nueva gira.', 0, 1, 'C');
}

$pdf->Output();
