<?php App::import('Vendor','num2letras'); 
$num =  new num_letras();
?>
<table border="0" width="603">
    <tr>
        <td height="462px">
            
            <table border="0">
                <tr>
                    <td rowspan="2" style="font-size: 40px; margin-top: 8px;" width="310px" ><b>Junta Nacional de Defensa del Artesano</b></td>
                    <td width="100">&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-size: 24px;" ><b>RUC: 1760005460001</b></td>
                </tr>
            </table>
            <table border="0" width="350">
                <tr>
                    <td width="100" rowspan="4"><img src="img/logo_header.jpg" width="150px"/></td>
                    <td style="text-align: center;" width="100">MATRIZ: Av. 10 de Agosto N39 - 134 y Jose Pereria</td>
                    <td width="110">&nbsp;</td>
                    <td width="160" ></td>
                    
                </tr>
                <tr>
                    <td style="text-align: center;">Telf.: 2559 842 / 2234 277 / 223 4821 /</td>
                    <td>&nbsp;</td>
                    <td style="font-size: 24px;"><b>Autorización SRI: 1110150500</b></td>
                </tr>
                <tr>
                    <td style="text-align: center;">2221 277 / 2221 276</td>
                    <td>&nbsp;</td>
                    <td><i>FECHA DE AUTORIZACIÓN:</i><?php if(isset($ventaEspecie[0]["Factura"]["created"])) { $fecha = explode(" ",$ventaEspecie[0]["Factura"]["created"]); echo " ".$fecha[0]; } ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">Email: juntaart@uio.satnet.net</td>
                    <td>&nbsp;</td>
                    <td><i>VALIDO HASTA:</i><?php if(isset($ventaEspecie[0]["Factura"]["created"])) { echo " ".date('Y-m-d', $ventaEspecie[0]["Factura"]["created"]+strtotime('+12 month')); } ?></td>
                </tr>
            </table>
            <table border="0" width="450">
                <tr>
                    <td width="10" rowspan="4">&nbsp;</td>
                    <td width="32" >Cliente: </td>
                    <td  width="210px"><div style="text-align: left; border-bottom: 1px solid black;"><?php if(isset($ventaEspecie[0]["Factura"]["fac_cliente"])){ print($ventaEspecie[0]["Factura"]["fac_cliente"]); } ?></div></td>
                    <td width="58" >&nbsp;</td>
                    <td >&nbsp;</td>
                    
                </tr>
                <tr>
    
                    <td >Dirección: </td>
                    <td ><div style="text-align: left; border-bottom: 1px solid black;"><?php if(isset($ventaEspecie[0]["Factura"]["fac_direccion"])){ print($ventaEspecie[0]["Factura"]["fac_direccion"]); } ?></div></td>
                    <td >&nbsp;</td>
                    <td >Fecha Emisión:&nbsp;<?php if(isset($ventaEspecie[0]["Factura"]["fac_fecha_emision"])){ print($ventaEspecie[0]["Factura"]["fac_fecha_emision"]); } ?></td>
                </tr>
                <tr>
                    <td >Telefono: </td>
                    <td ><div style="text-align: left; border-bottom: 1px solid black;"><?php if(isset($ventaEspecie[0]["Factura"]["fac_telefono"])){ print($ventaEspecie[0]["Factura"]["fac_telefono"]); } ?></div></td>
                    <td >&nbsp;</td>
                    <td ><div style="font-size: 18px;"><b>FACTURA:</b>&nbsp;<?php if(isset($ventaEspecie[0]["Factura"]["fac_numero"])) { print($ventaEspecie[0]["Factura"]["fac_numero"]); } ?></div></td>
                </tr>
                <tr>
                    <td >RUC C/CI: </td>
                    <td ><div style="text-align: left;  border-bottom: 1px solid black;"><?php if(isset($ventaEspecie[0]["Factura"]["fac_ruc_doc"])) { print($ventaEspecie[0]["Factura"]["fac_ruc_doc"]); } ?></div></td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    
                </tr>
            </table>
            <br>
            <table border="1">
                <tr>
                    <td width="60px" ><div style="font-size: 26px; text-align: center;"><b>CANTIDAD</b></div></td>
                    <td width="255px" ><div style="font-size: 26px; text-align: center;"><b>DESCRIPCIÓN</b></div></td>
                    <td width="80px" ><div style="font-size: 26px; text-align: center;"><b>V. UNITARIO</b></div></td>
                    <td width="90px" ><div style="font-size: 26px; text-align: center;"><b>VALOR TOTAL</b></div></td>
                </tr>
                <tr>
    
                    <td height="380px" style="font-size: 14px; text-align: center;">
						<?php	
						if(isset($ventaEspecie[0]["VentasEspecie"])) {
						    for($i=0; $i<count($ventaEspecie[0]["VentasEspecie"]); $i++) {
								  print($ventaEspecie[$i]["VentasEspecie"][$i]["ven_cantidad"]); 
							}
						}
						?>
                    	
                    	</td>
                    <td style="text-align: justify; font-size: 14px;"> 
                    	<ul>
                    	<?php for($i=0; $i<count($especiesValoradas); $i++) {
                    	if(isset($especiesValoradas)){
                    			echo "<li>".$especiesValoradas[$i]["EspeciesValorada"]["nombre_especie"]."</li>";
							}
                    	}
                    	?>
                    	</ul>
                    </td>
                    <td style="text-align: center; font-size: 14px;" ><?php for($i=0; $i<count($especiesValoradas); $i++) {
                    		echo $especiesValoradas[$i]["EspeciesValorada"]["valor_unitario"]."<br>";
                    	}
                    	?></td>
                    <td style="font-size: 14px; text-align: center;">
                    	
                    	<?php 
                    	$SubTotal = 0;
                    	if(isset($ventaEspecie[0]["VentasEspecie"])){
							for($i=0; $i<count($ventaEspecie[0]["VentasEspecie"]); $i++) {
								print($ventaEspecie[$i]["VentasEspecie"][$i]["ven_valor"]); 
								$SubTotal = $SubTotal + $ventaEspecie[$i]["VentasEspecie"][$i]["ven_valor"];
							}
						}
					   $ivaImp = ($SubTotal * $iva)/100;
					   $totalImp = $SubTotal - $ivaImp;
					   
                    	?></td>
                </tr>

            </table>
            <table border="1">
            	<tr>
                    <td width="60" height="12px;" style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;">SON:</td>
                    <td width="255" height="12px;" style="font-size: 20px; margin-top:60px;  text-align: left; padding: 14px;"><?php echo " ".$num->num2letras($totalImp)." dolares"; ?></td>
                    <td width="80" height="12px;" style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;">SUB TOTAL</td>
                    <td width="90" height="12px;" style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;"><?php echo $SubTotal; ?></td>
                </tr>
               
                <tr>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;">I.V.A 0%</td>
              		<td style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;"><?php echo $iva1 = ($SubTotal * $iva)/100; ?></td>
                   
                </tr>
                <tr>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;">I.V.A 0%</td>
            		<td style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;"><?php echo $iva2 = ($SubTotal * $iva)/100; ?></td>
                </tr>
                <tr>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;">TOTAL $</td>
      				<td style="font-size: 20px; margin-top:60px;  text-align: center; padding: 20px;"><?php echo $total = $SubTotal - $iva1; ?></td>
                   
                </tr>
            </table>
         	<br>
         	<br>
         	<br>
         	   <table border="0">
                <tr>
                    <td width="80px">&nbsp;</td>
                    <td width="130px">&nbsp;</td>
                    <td  width="25">&nbsp;</td>
                    <td >&nbsp;</td>
                </tr>
                <tr>
                    <td >&nbsp;</td>
                    <td ><div style="text-align: left; border-bottom: 1px solid black;"></div><br>Recibí conforme</td>
                    <td >&nbsp;</td>
                     <td ><div style="text-align: left; border-bottom: 1px solid black;"></div><br>Firma autorizada</td>
                </tr>
                
                <tr>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                     <td >&nbsp;</td>
                </tr>
                
            </table>
        </td>
    </tr>
    
</table>