<?php
include "vendor/autoload.php";
use Fpdf\Fpdf;

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Kirsten Pearl Fernandez',0,2);
$pdf->Cell(40,10,'Bachelor of Science in Information Technology',0,2);
$pdf->Cell(40,10,'fernandez.kirstenpearl@auf.edu.ph',0,2);
$pdf->Cell(60,10,'20-1260-667',0,2);
$pdf->Output();