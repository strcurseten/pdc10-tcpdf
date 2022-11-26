<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetFont('helvetica', 'B', 20);
$pdf->AddPage();
$pdf->Write(0, 'January 2023 Calendar', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 8);
$pdf->Ln(10);

$calendar = <<<EOD
<table border="0" cellpadding="10" cellspacing="5" align="center">
 <tr nobr="true">
  <td></td>
  <td>Sunday</td>
  <td>Monday</td>
  <td>Tuesday</td>
  <td>Wednesday</td>
  <td>Thursday</td>
  <td>Friday</td>
  <td>Saturday</td>
 </tr>
 <tr nobr="true">
 <td></td>
  <td><br/></td>
  <td><br/></td>
  <td style="background-color:pink;color:white;">1<br/>New Year's Day</td>
  <td style="background-color:pink;color:white;">2<br/>(Special non-working day)</td>
  <td><br/>3</td>
  <td><br/>4</td>
  <td><br/>5</td>
 </tr>
 <tr nobr="true">
 <td></td>
  <td><br/>6</td>
  <td><br/>7</td>
  <td><br/>8</td>
  <td><br/>9</td>
  <td><br/>10</td>
  <td><br/>11</td>
  <td><br/>12</td>
 </tr>
 <tr nobr="true">
 <td></td>
  <td><br/>13</td>
  <td><br/>14</td>
  <td><br/>15</td>
  <td><br/>16</td>
  <td><br/>17</td>
  <td><br/>18</td>
  <td><br/>19</td>
 </tr>
 <tr nobr="true">
 <td></td>
  <td><br/>20</td>
  <td><br/>21</td>
  <td><br/>22</td>
  <td><br/>23</td>
  <td><br/>24</td>
  <td><br/>25</td>
  <td><br/>26</td>
 </tr>
 <tr nobr="true">
 <td></td>
  <td><br/>27</td>
  <td><br/>28</td>
  <td><br/>29</td>
  <td><br/>30</td>
  <td><br/></td>
  <td><br/></td>
  <td><br/></td>
 </tr>
</table>
EOD;

$pdf->writeHTML($calendar, true, false, false, false, '');
$pdf->Output();