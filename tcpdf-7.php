<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage();

$red = array(255, 0, 0);
$blue = array(0, 0, 200);
$yellow = array(255, 255, 0);
$green = array(0, 255, 0);
$white = array(255);
$black = array(0);

// set the coordinates x1,y1,x2,y2 of the gradient (see linear_gradient_coords.jpg)
$coords = array(0, 0, 1, 0);

// paint a linear gradient
$pdf->LinearGradient(30, 60, 150, 80, $red, $green, $coords);

$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 64, 128));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));

$pdf->RoundedRect(35, 65, 140, 70, 10.0, '1111', null, $style6);
$pdf->StarPolygon(105, 85, 10, 20, 6, 0, 1, 'DF', array('all' => $style5), array(220, 220, 200), 'F', array(255, 200, 200));
$pdf->StarPolygon(105, 85, 5, 12, 5, 45, 0, 'DF', array('all' => $style7), array(220, 220, 200), 'F', array(255, 200, 200));

$pdf->SetFont('helvetica', '', 32);
$pdf->SetTextColor(245,245,245);
$pdf->Text(65, 100, 'Happy Holidays!');
$pdf->Output();