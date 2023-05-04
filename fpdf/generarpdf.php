<?php
$num_pags = $_POST['select1'];

require('fpdf.php');

$pdf = new FPDF();

for ($i = 1; $i <= $num_pags; $i++) {
    // Agrega contenido a cada página aquí
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Página ' . $i, 1, 1, 'C');
}
$pdf->Output();
