<?php 
App::import('Vendor', 'dompdf/dompdf');
$dompdf = new DOMPDF();
$dompdf->load_html(utf8_decode($content_for_layout), Configure::read('App.encoding'));
$dompdf->render();
echo $dompdf->output();
?>