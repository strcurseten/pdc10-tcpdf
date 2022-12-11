<?php

require "vendor/autoload.php";

class MYPDF extends TCPDF
{
function Header()
{
    $this->SetFont('Times', 'B', 20);
    $this->Ln(15);
    
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Times','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$CH01 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/CH_01.txt', false);
$CH02 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/CH_02.txt', false);
$CH03 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/CH_03.txt', false);

$pdf->SetFont('times', '', 12);
$pdf->AddPage();
$pdf->Write(5, $CH01, '', 0, '', false, 0, false, false, 0);
$pdf->Write(5, $CH02, '', 0, '', false, 0, false, false, 0);
$pdf->Write(5, $CH03, '', 0, '', false, 0, false, false, 0);
$pdf->Output();