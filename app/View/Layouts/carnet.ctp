<?php
header("Content-type: application/pdf");

App::import('Vendor','especie'); 
$pagelayout = array(325, 204);
$pdf = new ESPECIE(PDF_PAGE_ORIENTATION, PDF_UNIT, $pagelayout, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//$pdf = new ESPECIE(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

/*$width = 325;  
$height = 204; 
$orientation = ($height>$width) ? 'P' : 'L';  
$pdf->addFormat("custom", $width, $height);  
$pdf->reFormat("custom", $orientation); */



// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Junta Nacional de Artesanos');
$pdf->SetTitle('Reporte');
$pdf->SetSubject('Documento Junta de defensa del artesano');
$pdf->SetKeywords('Artesanos, Artesanias, Ecuador, Defensa del artesano, Ramas artesanias');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //3217020347

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
TCPDF Example 003

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
//$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->writeHTML($content_for_layout, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('carnet.pdf', 'D');
 
//echo $content_for_layout;
?> 
