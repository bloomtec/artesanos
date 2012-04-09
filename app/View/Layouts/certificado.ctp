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
#contenedor{
	margin:auto;
	border:1px solid #339;
	width: 1122px;
	height:793px;
}

#contenedor2 {
	width: 950px;
	margin:50px auto;
	height:680px;
}

#sub_cont1{
	height:100px;
}

#sub_cont2{
	height:100px;
}

#imagen1{
	width:100px;
	height:100px;
	float:left;
}

#imagen2{
	width:100px;
	height:100px;
	float:left;
	
}

#encabezado1{
	width:820px;
	height:84px;
	float:right;
	padding:8px;
	
}

#titulo {
	font-size:36px;
}
#encabezado2{
	width:750px;
	height:80px;
	float:left;
	font-family: serif;
	font-size: 88px;
	padding:8px;
	text-align:center;
}

#parrafo {
	width:100%;
	height:25px;
	margin-top: 6px;
	font-size: 20px;
	
}

#texto {
	float:left;
	height:25px;
}

#texto_sub1 {
	height:25px;
	float:left;
	margin-left:4px;
	width:926px;
	border-bottom:1px solid #000;
}

#texto_sub2 {
	height:25px;
	float:left;
	margin-left:4px;
	width:748px;
	border-bottom:1px solid #000;
}

#texto_sub3 {
	height:25px;
	float:left;
	margin-left:4px;
	width:735px;
}

#texto_sub4 {
	height:25px;
	float:left;
	margin-top:6px;
	width:100%;
	border-bottom:1px solid #000;
}

#texto_sub5 {
	height:25px;
	float:left;
	margin-top:6px;
	width:100%;
	border-bottom:1px solid #000;
}

#texto_sub6 {
	height:25px;
	float:left;
	margin-top:6px;
	width:240px;
	border-bottom:1px solid #000;
}

#texto_sub7 {
	height:25px;
	float:left;
	width:330px;
	margin-top:6px;
	border-bottom:1px solid #000;
}

#texto_sub8 {
	height:25px;
	float:left;
	width:145px;
	margin-top:6px;
	border-bottom:1px solid #000;
}

#texto_sub9 {
	height:25px;
	float:left;
	width:100px;
	margin-top:6px;
	border-bottom:1px solid #000;
}

#firmas {
	margin-top: 60px;
	height:auto;
	float:left;
	width:100%;
}

#firma1{
	width:auto;
	text-align:center;
	float: left;
}

#firma2 {
	width:auto;
	text-align:center;
	float: left;
	margin-left: 175px;
}

#firma3{
	width:auto;
	text-align:center;
	float: right;
}

#directores {
	float:left;
	margin-top:60px;
	width:100%;
}

#director{
	float:left;
	margin-left:150px;
	width:auto;
}

#instructor{
	float:right;
	margin-right:180px;
	width:auto;
}

#slogan {
	float:left;
	margin-top:40px;
	width:100%;
	text-align:center;
	font-size: 22px;
}

#capa1{
	font-size: 20px;	
}
</style>';

// define some HTML content with style

$html = $css . $content_for_layout;

// print a block of text using Write()
//$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf -> writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
if (isset($nombre_archivo)) {
	$pdf -> Output($nombre_archivo . "_" . date("Y-m-d_H:i:s", time()).".pdf", 'D');
} else {
	$pdf -> Output('certificado.pdf', 'D');
}

//echo $content_for_layout;
?>