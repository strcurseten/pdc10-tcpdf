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

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$pdf->SetFont('Times', 12);
$pdf->Ln(30);
$html = <<<EOD
Angeles University Foundation, a non-stock, non-profit educational institution, was established on May 25, 1962 by Mr. Agustin P. Angeles, Dr. Barbara Y. Angeles, and family. In less than nine years, the Institution was granted University status on April 16, 1971 by the Department of Education, Culture and Sports. 
On December 4, 1975, the University was converted to a non-stock, non-profit educational foundation -- the Angeles couple and their children executed a Deed of Donation relinquishing their ownership. AUF was incorporated under Republic Act No. 6055, otherwise known as the Foundation Law, and became a tax-exempt institution approved by the Philippine government. 
All donations and bequests given to the AUF are tax deductible. On February 14, 1978, AUF was converted to a Catholic University. As the first Catholic university in Central Luzon, AUF ensures not only professional success but total development which is anchored on Christian education that is holistic, integrated and formative.
EOD;
$pdf->Write(0, $html, '', 0, 'C', true, 0, false, false, 0);
$pdf->Output();
