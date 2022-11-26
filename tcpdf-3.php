<?php
require "vendor/autoload.php";

class MYPDF extends TCPDF
{
function Header()
{
    $image = K_PATH_IMAGES.'auf-logo.jpg';
    $this->Image($image, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    $this->SetFont('Times', 'B', 20);
    $this->Ln(15);
    $this->Cell(0, 15, 'Brief History of Angeles University Foundation', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Times','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$CH01 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/CH-01.txt', false);
$CH02 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/CH-02.txt', false);
$CH03 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/CH-03.txt', false);

$pdf->SetFont('times', '', 12);
$pdf->AddPage();
$pdf->Write(5, $CH01, '', 0, '', false, 0, false, false, 0);
$pdf->Write(5, $CH02, '', 0, '', false, 0, false, false, 0);
$pdf->Write(5, $CH03, '', 0, '', false, 0, false, false, 0);
$pdf->Output();