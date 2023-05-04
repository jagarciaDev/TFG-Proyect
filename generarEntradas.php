<?php
header('Content-Type: text/html; charset=utf-8');

$num_pags = $_POST['select1'];

require('fpdf/fpdf.php');

$pdf = new FPDF();

for ($i = 1; $i <= $num_pags; $i++) { // Agrega contenido a cada página aquí $pdf->AddPage();
    $pdf->AddPage();
    // Define el tamaño y posición de la imagen
    $pdf->Image('images\disco11.jpg', 10, 90, 40);

    // Define la fuente y tamaño de letra
    $pdf->AddFont('Helvetica', '', 'helvetica.php', true);
    $pdf->SetFont('helvetica', '', 16);

    // Añade un título
    $pdf->Cell(0, 20, 'Entrada ' . $i, 0, 1, 'C');

    // Añade un texto explicativo
    $pdf->Cell(0, 10, 'Este es un ejemplo de PDF generado con PHP y FPDF.', 0, 1, 'L');
}

$pdf->Output();
