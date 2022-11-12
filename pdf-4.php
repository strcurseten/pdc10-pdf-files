<?php
include "vendor/autoload.php";
use Fpdf\Fpdf;

class PDF extends FPDF
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
                $this->Cell(40,6,$col,1);
            $this->Ln();
        }
    }
}

// (A) OPEN CSV FILE
$stream = fopen("countries.csv", "r");

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

// $pdf = new PDF();
// // Column headings
// $header = array('Country (or dependency)','Population on -2020','Yearly Change','Net Change','Density (P/Km�)','Land Area Km�)','Migrants (net)','Fert. Rate','Med. Age','Urban Pop %','World Share');
// // Data loading
// $data = $pdf->LoadData('countries.txt');
// $pdf->SetFont('Arial','',14);
// $pdf->AddPage();
// $pdf->BasicTable($header,$data);
// $pdf->Output();

$pdf = new PDF();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->BasicTable($headers, $data);
$pdf->Output();
?>