
<?php
require('tfpdf.php');

$pdf = new tFPDF();
$pdf->AddPage();

$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->SetFont('DejaVu','',14);

$pdf->Cell(0, 10, 'Bonjour, ça fonctionne avec les accents ééèç ! 😀', 0, 1);
$pdf->Output();
?>
