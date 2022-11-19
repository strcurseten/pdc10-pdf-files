<?php
//require('tcpdf_include.php');
include "vendor/autoload.php";
use TCPDF;
ob_start();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

class PDF extends TCPDF
{

function __construct()
    {
      parent::__construct('L');
    }

    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

    // Simple table
    function BasicTable($headers, $data)
    {
        // Header
        foreach($headers as $col)
          $this->Cell(40,7,$col,1);
          $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col)
                $pdf->Cell(40,6,$col,1);
                $pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
                $pdf->write1DBarcode('CODE 39', 'C39', '', '', '', 18, 0.4, $style, 'N');
            $this->Ln();
        }
    }
}

// (A) OPEN CSV FILE
$stream = fopen("countries_code.csv", "r");

// (B) EXTRACT ROWS & COLS
$index = 0;
$headers = [];
$data = [];
while (($row = fgetcsv($stream)) !== false) {
  if ($index++ < 1) {
    foreach ($row as $col) {
      array_push($headers, $col);
    }
  } else {
    $line = [];
    foreach ($row as $col) {
      array_push($line, $col);
    }
    array_push($data, $line);
  }
}

// (C) CLOSE CSV FILE
fclose($stream);

$pdf = new PDF();
//$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->BasicTable($headers, $data);
$pdf->Output();
?>