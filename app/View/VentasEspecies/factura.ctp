<?php App::import('Vendor','num2letras'); 
$num =  new num_letras();
?>
	<table>
		<tr>
			<td width="416px">
				<table border="0" >
					<tr >
						<td colspan="2" height="5px;"></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2"><div style="font-size: 32px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($ventaEspecie[0]["Factura"]["fac_cliente"])){ print($ventaEspecie[0]["Factura"]["fac_cliente"]); } ?></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr >
						<td colspan="2" height="3px;"></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2"><div style="font-size: 32px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($ventaEspecie[0]["Factura"]["fac_direccion"])){ print($ventaEspecie[0]["Factura"]["fac_direccion"]); } ?></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr >
						<td colspan="2" height="5px;"></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2"><div style="font-size: 32px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($ventaEspecie[0]["Factura"]["fac_telefono"])){ print($ventaEspecie[0]["Factura"]["fac_telefono"]); } ?></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr >
						<td colspan="2" height="6px;"></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2"><div style="font-size: 32px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($ventaEspecie[0]["Factura"]["fac_ruc_doc"])) { print($ventaEspecie[0]["Factura"]["fac_ruc_doc"]); } ?></div></td>
						<td>&nbsp;</td>
					</tr>
				</table>
				
			</td>
			<td>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>		
				<table border="0">
					<tr>
						<td colspan="2"><div style="font-size: 28px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($ventaEspecie[0]["Factura"]["fac_fecha_emision"])){ print($ventaEspecie[0]["Factura"]["fac_fecha_emision"]); } ?></div></td>
						<td>&nbsp;</td>
					</tr>
				</table>
					
			</td>
		</tr>
	</table>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<table border="0">
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td width="85px"><div style="font-size: 28px;">
				<?php 
				$tiposEspecie = array();
				$tiposEspecie2 = array();
				for($i=0; $i<count($especiesValoradas); $i++) {
					if(isset($especiesValoradas)) {
                    	if(!in_array($especiesValoradas[$i]["EspeciesValorada"]["tipos_especies_valorada_id"], $tiposEspecie)){
						       $tiposEspecie[] = $especiesValoradas[$i]["EspeciesValorada"]["tipos_especies_valorada_id"];
							} 
							    $tiposEspecie2[] = $especiesValoradas[$i]["EspeciesValorada"]["tipos_especies_valorada_id"];
                    	}
				}
				
				$cantidades = array();
				foreach($tiposEspecie as $value1) {
					$cantidad = 0;
					foreach($tiposEspecie2 as $value2) {
							if($value1 == $value2) {
								$cantidad++;
							}
					}
					
					$cantidades[] = $cantidad;
					echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;".$cantidad;
				}
                 ?>
				<!-- &nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333 
				-->
				</div></td>
			<td width="400px"><div style="font-size: 26px;">
				<!-- &nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333 -->
				
			    
				<?php 
				$tiposEspecie = array();
				$contador = 0;
				for($i=0; $i<count($especiesValoradas); $i++) {
                    	if(isset($especiesValoradas) && !in_array($especiesValoradas[$i]["EspeciesValorada"]["tipos_especies_valorada_id"], $tiposEspecie)){
                    			echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;".$especiesValoradas[$i]["EspeciesValorada"]["nombre_especie"];
								$tiposEspecie[] = $especiesValoradas[$i]["EspeciesValorada"]["tipos_especies_valorada_id"];
								$contador++;
							} 
                    	}
				//Para que no se descuadren las medidas
					$hasta = 19 - $contador;
					for($j=0; $j<$hasta; $j++) {
						echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;";
					}
                 ?>
                 
                
				</div></td>
			<td width="100px"><div style="font-size: 28px;"><!-- &nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333 -->
				<?php 
				$tiposEspecie = array();
				$valores = array();
				for($i=0; $i<count($especiesValoradas); $i++) {
					if(isset($especiesValoradas)) {
                    	if(!in_array($especiesValoradas[$i]["EspeciesValorada"]["tipos_especies_valorada_id"], $tiposEspecie)){
						       $tiposEspecie[] = $especiesValoradas[$i]["EspeciesValorada"]["tipos_especies_valorada_id"];
							   $valores[] = $especiesValoradas[$i]["EspeciesValorada"]["valor_unitario"];
							} 
							    
                    	}
				}
				
				foreach($valores as $valor) {
					echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;".$valor;
				}
                 ?>
				</div></td>
			<td width="110px"><div style="font-size: 28px;"><!-- &nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333
				<br>&nbsp;&nbsp;&nbsp;&nbsp;33333333 -->
				<?php
				 $totales = array();
					for($i=0; $i< count($cantidades); $i++) {
						$res = 0;
						$res = $valores[$i] * $cantidades[$i];
						$totales[] = $res;
						echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;".$res;
					}
				?>
				</div></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div style="">
	<table border="0" width="620px">
		<tr>
			<td width="500px">
				<table border="0">
					<tr >
						<td height="4px">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr >
						<?php 
						$subTotal = 0;
						$subTotal = array_sum($totales);
						$iva1 = ($subTotal * $iva)/100; 
						$total = 0; 
						$total = $subTotal - $iva1; 
						?>
						<td width="45px">&nbsp;</td>
						<td colspan="2" width="100%"><div style="font-size: 28px;"><?php echo " ".$num->num2letras($total)." dolares"; ?></div></td>
						
					</tr>
					<tr >
						<td height="28px">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td height="8px">&nbsp;</td>
						<td><div style="font-size: 28px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- 1Firma1--></div></td>
						<td><div style="font-size: 28px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- 1Firma2--></div></td>
					</tr>
				</table>
			</td>
			<td width="200px">
				<table border="0" width="100%">
				
					<tr>
							<td height="10px" width="97px">&nbsp;</td>
							<td width="142px" colspan="2"><div style="font-size: 28px;"><?php $subTotal = 0; echo $subTotal = array_sum($totales); ?></div></td>
							
					</tr>
					<tr >
						<td height="7px">&nbsp;</td>
						<td width="142px">&nbsp;</td>
						
					</tr>
						<tr>
							<td height="10px" width="97px">&nbsp;</td>
							<td width="142px" colspan="2"><div style="font-size: 28px;"><?php echo $iva1 = ($subTotal * $iva)/100; ?></div></td>
							
						</tr>
					<tr >
						<td height="7px">&nbsp;</td>
						<td width="142px">&nbsp;</td>
						
					</tr>
						<tr>
							<td height="10px" width="97px">&nbsp;</td>
							<td width="142px" colspan="2"><div style="font-size: 28px;"><?php echo $iva2 = ($subTotal * $iva)/100; ?></div></td>
							
						</tr>
					<tr >
						<td height="7px">&nbsp;</td>
						<td width="142px">&nbsp;</td>
						
					</tr>
						<tr>
							<td height="10px" width="97px">&nbsp;</td>
							<td width="142px" colspan="2"><div style="font-size: 28px;"><?php $total = 0; echo $total = $subTotal - $iva1; ?></div></td>
							
						</tr>
						
						
				</table>
			</td>
		</tr>
	</table>
	</div>
	<!--
		<table border="1" width="320px">
		<tr>
			<td>
				<table border="1" width="400px" >
					<tr >
						<td height="2px;"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td width="40px">&nbsp;</td>
						<td colspan="2" width="400px" style="font-size: 28px;">&nbsp;&nbsp;&nbsp;&nbsp;8Son:</td>
						
					</tr>
					<tr >
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td width="285px" style="font-size: 28px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma:</td>
						<td width="185px" style="font-size: 28px;">Firma2:</td>
					</tr>
				</table>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
	<table border="1" width="860px">
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="42px">&nbsp;</td>
			<td width="455px"><div style="font-size: 35px; height:20px;">2Son:</div> </td>
			<td width="30px">&nbsp;</td>
			<td width="60px">&nbsp;</td>
			<td width="80px" height="25px;">&nbsp;</td>
		</tr>
		
		<tr>
			<td >&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	-->