<?php
header("Content-type: application/pdf");

App::import('Vendor', 'bloompdf');
$pdf = new BLOOMPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf -> SetCreator(PDF_CREATOR);
$pdf -> SetAuthor('Junta Nacional de Artesanos');
$pdf -> SetTitle('Reporte');
$pdf -> SetSubject('Documento Junta de defensa del artesano');
$pdf -> SetKeywords('Artesanos, Artesanias, Ecuador, Defensa del artesano, Ramas artesanias');

// set default header data
$pdf -> SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf -> setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf -> setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf -> SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf -> SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf -> SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf -> SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf -> setImageScale(PDF_IMAGE_SCALE_RATIO);
//3217020347

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
if(isset($tamano)) {
	$pdf -> SetFont('helvetica', '', $tamano);
} else {
	$pdf -> SetFont('helvetica', '', 7);
}

// add a page
$pdf -> AddPage();

$css = '<style>
h2 {
	text-align:center;
	font-size:23px;

	
}	
table {
	clear: both;
	color: #333;
	margin-bottom: 19px;
	width: 100%;
}

tr td {
	padding: 4px;
	text-align: left;
	vertical-align: middle;
	border: 1px solid black;
	height: auto;
	margin-top:2px;
}
th{
	height: auto;
	border: 1px solid #152554;
	background-color: #000;
	text-align: center;
	padding: 2px;
	color: #fff;
	font-weight: bold;
	font-size: 25px;
}


tr:nth-child(even) {
	background-image: url(/img/trama_tabla_azul.png);
	background-position: left bottom;
	background-repeat: repeat-x;
}

a {
	text-decoration:none;
}
</style>';

// define some HTML content with style

$html = $content_for_layout;

// print a block of text using Write()
//$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf -> writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
if (isset($nombre_archivo)) {
	$pdf -> Output($nombre_archivo . "_" . date("Y-m-d_H:i:s", time()).".pdf", 'D');
} else {
	$pdf -> Output('reporte.pdf', 'D');
}

//echo $content_for_layout;
?>