<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$img_file = K_PATH_IMAGES.'picture.jpg';
$pdf->Image($img_file, 0, 0, 240, 300, '', '', '', false, 400, '', false, false, 0);
$html = <<<EOD
<h1><span style="color:white;text-align:center;font-weight:bold;">Kirsten Pearl Fernandez </span></h1>
<h1><span style="color:white;text-align:center;font-weight:bold;">Bachelor of Science in Information Technology</span></h1>
<h2><span style="color:white;text-align:center;font-weight:bold;">fernandez.kirstenpearl@auf.edu.ph</span></h2>
<h2><span style="color:white;text-align:center;font-weight:bold;">20-1260-667</span></h2>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output();