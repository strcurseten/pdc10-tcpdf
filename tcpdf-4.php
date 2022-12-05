<?php
require "vendor/autoload.php";

$csv_file = 'countries.csv';
$handle = fopen($csv_file, 'r');
$row_index = 0; 
$headers = [];
$data = [];
$barcode = [];

while (($row_data = fgetcsv($handle, 1000, ',')) !== FALSE)
{
	if ($row_index++ < 1)
	{
		foreach ($row_data as $col)
		{
			array_push($headers, $col);
		}
		continue;
	}

	$tmp = [];
	for ($index = 0; $index < count($headers); $index++)
	{
		$tmp[$headers[$index]] = $row_data[$index];
	}
	array_push($data, $tmp);
}

fclose($handle);

class MC_TCPDF extends TCPDF {
	function BasicTable($header, $data)
	{
		// Header
		foreach($header as $col)
			$this->Cell(55,15,$col,1,0,'C');
			$this->Ln();																																	
		// Data
		foreach($data as $row)
		{
			$country_code = array_slice($row, 1, 1, true);

			foreach($row as $col) 
				$this->Cell(55,40,$col,1,0,'C');
				$x = $this->GetX();
				$y = $this->GetY();

			foreach($country_code as $code)
					$brstyle = array(
						'position' => '',
						'align' => 'C',
						'stretch' => false,
						'fitwidth' => true,
						'cellfitalign' => '',
						'border' => true,
						'hpadding' => 'auto',
						'vpadding' => 'auto',
						'fgcolor' => array(0,0,0),
						'bgcolor' => false, //array(255,255,255),
						'text' => true,
						'font' => 'times',
						'fontsize' => 8,
						'stretchtext' => 4);

					//set style for barcode
					$qrstyle = array(
						'border' => 2,
						'vpadding' => 'auto',
						'hpadding' => 'auto',
						'fgcolor' => array(0,0,0),
						'bgcolor' => false, 
						'module_width' => 1, 
						'module_height' => 1, 
					);

					//var_dump($c);
					$this->write1DBarcode($code, 'C39E', '', '', 55, 40, 0.6, $brstyle, '');
					$this->write2DBarcode($code, 'QRCODE,L', $x+55, $y, 55, 40, $qrstyle, '',true);
					$this->Ln();
		}

		
	}
}

$pdf = new MC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$header = array('Country', 'Country Code', 'Population', 'Barcode', 'QR Code');
$pdf->setCellPaddings(0,0,0,0);
$pdf->SetFont('times','',14);
$pdf->AddPage('L');
$pdf->BasicTable($header,$data);
$pdf->Output();