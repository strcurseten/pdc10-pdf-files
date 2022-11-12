<?php
include "vendor/autoload.php";

use Fpdf\Fpdf;

$pdf = new Fpdf();
$pdf->AddFont('PartyConfetti');
$pdf->AddPage();
$pdf->SetFont('PartyConfetti','',35);
$pdf->Write(10,'I can love well, because I am loved well');

$pdf->Ln(10);

$pdf->SetFont('PartyConfetti','',15);
$pdf->Write(10,'Quote By Choi Soobin');

$pdf->Ln(20);

$pdf->AddFont('WinterCruise');
$pdf->SetFont('WinterCruise','',35);
$pdf->Write(10,'Compare yourself to the past you, become a you that\'s better than what you were yesterday.');

$pdf->Ln(10);

$pdf->SetFont('WinterCruise','',15);
$pdf->Write(10,'Quote By Kang Taehyun');
$pdf->Output();

// Run php vendor/fpdf/fpdf/src/Fpdf/makefont/makefont.php fonts/PartyConfetti.ttf
// php vendor/fpdf/fpdf/src/Fpdf/makefont/makefont.php fonts/WinterCruise.ttf
// Move the generated files to the font folder (vendor/fpdf/fpdf/src/Fpdf/font/)