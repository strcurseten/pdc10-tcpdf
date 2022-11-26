<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$pdf->setFontSubsetting(false);

$pdf->SetFont('cid0ct', '', 16);
$pdf->MultiCell(80, 0, "[Choi Soobin] : I can love well, because I am loved well.\n", 0, 'J', 0, 1, '', '', true, 0);
$pdf->Ln(20);

$pdf->SetFont('courier', '', 16);
$pdf->MultiCell(80, 0, "[Kang Taehyun] : Compare yourself to the past you, become a you that's better than what you were yesterday.\n", 0, 'J', 0, 1, '', '', true, 0);
$pdf->Ln(2);
$pdf->Output();
