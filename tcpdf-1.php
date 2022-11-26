<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$html = <<<EOD
<h1>Kirsten Pearl Fernandez <style="text-decoration:none;background-color:#CC0000;color:black;"></h1>
<h1>Bachelor of Science in Information Technology<style="text-decoration:none;background-color:#CC0000;color:black;"></h1>
<h2>fernandez.kirstenpearl@auf.edu.ph<style="text-decoration:none;background-color:#CC0000;color:black;"></h2>
<h2>20-1260-667<style="text-decoration:none;background-color:#CC0000;color:black;"></h2>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output('example_001.pdf', 'I');