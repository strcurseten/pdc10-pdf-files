<?php
include "vendor/autoload.php";

class MYPDF extends TCPDF {
    public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = K_PATH_IMAGES.'pic.png';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
// $pdf->Cell(40,10,'Kirsten Pearl Fernandez',0,2);
// $pdf->Cell(40,10,'Bachelor of Science in Information Technology',0,2);
// $pdf->Cell(40,10,'fernandez.kirstenpearl@auf.edu.ph',0,2);
// $pdf->Cell(60,10,'20-1260-667',0,2);
// $pdf->Output();


$html = '<span style="background-color:white;color:black;">
<p>Kirsten Pearl Fernandez</p>
<p>Bachelor of Science in Information Technology</p>
<p>fernandez.kirstenpearl@auf.edu.ph</p>
<p>20-1260-667</p>
</span>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->setPrintHeader(false);

$pdf->Output();