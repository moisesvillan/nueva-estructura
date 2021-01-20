<?php
require '../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');

ob_start();
require_once '../scripts/pdf/reporte.php';
$html=ob_get_clean();
$html2pdf->writeHTML($html);
$html2pdf->output();
?>
