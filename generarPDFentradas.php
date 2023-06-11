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

    // Generar las páginas para frontstage
    for ($i = 1; $i <= $frontstage; $i++) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada para Front Stage', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Numero de entrada: ' . $i, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Horario de apertura de puertas: 19h', 0, 1, 'C', false, '', 8);
        $pdf->Cell(0, 10, 'Horario de inicio de concierto: 21h', 0, 1, 'C', false, '', 8);


        // Agregar descripción de la entrada
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, 'Esta entrada te brinda acceso a la zona Front Stage, donde podras disfrutar de una vista privilegiada del escenario y vivir una experiencia unica en el concierto.', 0, 'J');

        // Agregar imagen
        $pdf->Image('images/disco11.jpg', $pdf->GetX() + 30, $pdf->GetY() + 10, 150, 0, 'JPEG');
    }


    // Generar las páginas para grada general
    for ($i = 1; $i <= $gradageneral; $i++) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada para Grada General', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Numero de entrada: ' . $i, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Horario de apertura de puertas: 19h', 0, 1, 'C', false, '', 8);
        $pdf->Cell(0, 10, 'Horario de inicio de concierto: 21h', 0, 1, 'C', false, '', 8);

        // Agregar descripción de la entrada
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, 'Esta entrada te brinda acceso a la Grada General, desde donde podras disfrutar del concierto con una vista panoramica del escenario y vivir una experiencia unica.', 0, 'J');

        // Agregar imagen
        $pdf->Image('images/disco11.jpg', $pdf->GetX() + 30, $pdf->GetY() + 10, 150, 0, 'JPEG');
    }

    // Generar las páginas para anfiteatro
    for ($i = 1; $i <= $anfiteatro; $i++) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Entrada para Anfiteatro', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Numero de entrada: ' . $i, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Horario de apertura de puertas: 19h', 0, 1, 'C', false, '', 8);
        $pdf->Cell(0, 10, 'Horario de inicio de concierto: 21h', 0, 1, 'C', false, '', 8);

        // Agregar descripción de la entrada
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, 'Esta entrada te brinda acceso al Anfiteatro, donde podras disfrutar del concierto con una vista elevada y una excelente acustica. Vive la emoción de la musica rodeado de un ambiente inigualable.', 0, 'J');

        // Agregar imagen
        $pdf->Image('images/disco11.jpg', $pdf->GetX() + 30, $pdf->GetY() + 10, 150, 0, 'JPEG');
    }

    // Generar el archivo PDF
    $pdf->Output('entradas.pdf', 'D');
}
