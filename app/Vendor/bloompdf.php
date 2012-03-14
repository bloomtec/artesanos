<?php 
App::import('Vendor','tcpdf/tcpdf'); 

class BLOOMPDF  extends TCPDF 
{ 

    var $xheadertext  = 'Reporte'; 
    var $xheadercolor = array(0,0,200); 
    var $xfootertext  = 'Junta Nacional De Artesanos. Todos los derechos reservados'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ; 
	var $xheaderfont  = PDF_FONT_NAME_MAIN ; 
    var $xheaderfontsize = 5 ; 


    /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    */ 
    function Header() 
    { 

      	$year = date('m/d/Y H:i:s'); 
		 $image_file = IMAGES.'logo_header.png';
		                        //X   Y    W    H
        $this->Image($image_file, 10, 10, 50,'', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->setY(10); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top 
        //$this->SetFillColor(255, 255, 255,true); 
        $this->SetTextColor(0 , 0, 0); 
		$this->SetFont($this->xheaderfont,'',$this->xheaderfontsize); 
        $this->Cell(0,17, "Impreso: ".$year,'B',1,'R');

        //$this->Cell(90,26,$this->xheadertext);
    } 

    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
    function Footer() 
    { 
        $year = date('m/d/Y'); 
        $footertext = $this->xfootertext." - ".$year; 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
		 $this->Cell(0,8, 'Página'.$this->getAliasNumPage().' de '.$this->getAliasNbPages() ,'T',1,'C');
    } 
} 
?>