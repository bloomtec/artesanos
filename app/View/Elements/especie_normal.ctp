<table width="360" height="221" border="0" cellpadding="0" cellspacing="0">
  <tr>
  	<td width="360"><div style="text-align: center;"><b>CALIFICACIÓN TALLER ARTESANAL <br >Nro. <?php echo $inspeccion['Calificacion']['id']; ?></b></div></td>
  	<td width="60"><div style="text-align: right;"><b>PERSONAL E <br />INTRANSFERIBLE</b></div></td>
  </tr>
</table>
<br />
<br />

<table  border="0" cellpadding="0" cellspacing="0">
  <tr>
  	<td style="text-align: center;" width="420" cellspacing="0"><span>La junta nacional de Defensa del Artesano, vista la solicitud de Calificación Nro. <?php echo $inspeccion['Calificacion']['cal_numero_valido']; ?> presentada el
    <?php echo $inspeccion['Calificacion']['created']; ?> previo el estudio e informe de la Unidad de Inspección y Calificación de Talleres Artesanales de la Dirección Técnica, y de conformidad con los Arts. 2 
    liberal b), y 15 de la Ley de Defensa del del Artesano y Art. 5 del
Reglamento de calificaciones y Ramas de Trabajos Vigentes <br>
    </span></td>
  </tr>
</table>

<br />
<table  border="0" cellpadding="0" cellspacing="0">
	<tr>
  	<td width="420" height="0" style="text-align: center;">
	  	<b>RESUELVE</b>
    </td>
  </tr>
  <tr>
  	<td style="text-align: center;">
	  	<span>Conceder el CERTIFICADO DE CALIFICACIÓN ARTESANAL, con derecho a los beneficios comtemplados en el inciso final del Art. 2, Arts. 16, 17, 18 y 19 de la Ley de Defensa del Artesano, en concordancia con el Art. 302 del Código del Trabajo, Art. 367 de la Ley Orgánica del Régimen Municipal; Arts. 19 y 56, numeral 19 de la Ley de Régimen Tributario interno y Art. 171 de su reglamento a:</span>
    </td>
  </tr>
</table>
  <br >
  <br >
<table width="420" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  	<td >&nbsp;</td>
	    <td ><b><?php echo  $inspeccion['DatosPersonal'][0]['dat_nombres']
						. ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_paterno']
						. ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_materno']; 
		?></b></td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td >&nbsp;</td>
	    <td ><?php 
=======
<h1 style='margin-top:100px;'>CALIFICACION TALLER ARTESANAL</h1>
	<h1>Nro. <?php echo $inspeccion['Calificacion']['id']; ?> </h1>
	
	<!--<h1 class='right' style='color:red; font-size: 12px;'> DEFINIR A QUE HACE REFENCIA ESTE NUMERO </h1>-->
	<h3 class='right'> PERSONAL E</h3> 
	<h3 class='right'> INSTRANFERIBLE</h3>
	
	<p>
	 La Junta Nacional de Defensa del Artesano, vista la solicitud de Clificación Nro. <?php echo $inspeccion['Calificacion']['cal_numero_valido']; ?>&nbsp;
	presentada el <?php echo $inspeccion['Calificacion']['created']; ?>&nbsp;
	previo el estudio e informe de la Unidad de Inpección y Calificación de Talleres Artesanales de la Dirección Técnica, y de conformidad con los Arts. 2 literal b), y 15 de la Ley de Defensa del Artesanos y Art. 5 del Reglamento de Calificaciones y Ramas de Trabajo Vigentes.
	
	</p>
	
	<h1>RESUELVE</h1>
	
	<p>
		Conceder el CERTIFICADO DE CALIFICACIÓN ARTESANAL , con derecho a los beneficios contemplados en el inciso final del Art. 2, Arts. 16, 17, 18 y 19 de la Ley de Defensa del Artesano,
		en concordancia con el Art. 302 del Código de Trabajo, Art. 367 de la Ley Orgánica de Régimen Municipal; Arts. 19 y 56, numeral 19 de la Ley de Régimen Tributario interno y Art. 171 de su reglamento, a:
	</p>
	<h1>
		<?php echo  $inspeccion['DatosPersonal'][0]['dat_nombres']
						. ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_paterno']
						. ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_materno']; 
		?>
	</h1>
	<h1> 
		<?php 
			if($inspeccion['Artesano']['art_is_cedula']){
				echo "CC # ";
			}else{
				echo "PASAPORTE # ";
			}
			echo $inspeccion['Artesano']['art_cedula'];
		?></td>
	    <td >&nbsp;</td>
  	</tr>
</table>
  <br >
  <br >
<table width="420" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  	<td colspan="2" width="120" ><b>RAMA ARTESANAL:</b></td>
	    <td  colspan="3"><?php echo $inspeccion["Rama"]["ram_nombre"]; ?></td>
	    
	    <td width="10">&nbsp;</td>
	    <td width="110"><b>Lic. Luis Quishpi Vélez</b></td>
  	</tr>
  	<tr>
	  	<td colspan="2" ><b>RAZÓN SOCIAL:</b></td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td ><b>PRESIDENTE</b></td>
  	</tr>
  	<tr>
	  	<td colspan="2" ><b>DIRECCIÓN DEL TALLER:</b></td>
	    <td  colspan="3"><?php echo 'Calle / Avenida: ' . $inspeccion['Taller'][0]['tal_calle_o_avenida']; ?>
=======
		?> 
	</h1>
	<br />
	<table style="margin-top:50px;">
		<tr>
			<td style='font-size: 30px;' class="bold">RAMA ARTESANAL:</td>
			<td style='padding-left:40px;'><?php echo $inspeccion['Rama']['ram_nombre']; ?></td>
		</tr>
		<tr>
			<td class="bold">RAZÓN SOCIAL:</td>
			<td style='padding-left:40px;'><?php echo $inspeccion['Taller'][0]['tal_razon_social_o_nombre_comercial']; ?></td>
		</tr>
		<tr>
			<td class="bold">DIRECCIÓN DEL TALLER:</td>
			<td style='padding-left:40px;'>
				<?php echo 'Calle / Avenida: ' . $inspeccion['Taller'][0]['tal_calle_o_avenida']; ?>
>>>>>>> 17357cb0d622aaf2d8798fd22651138313235c42
				&nbsp;
				<?php echo 'Número: ' . $inspeccion['Taller'][0]['tal_numero']; ?>
				&nbsp;
				<?php echo 'Intersección: ' . $inspeccion['Taller'][0]['tal_interseccion']; ?>
				&nbsp;
				<?php echo 'Barrio: ' . $inspeccion['Taller'][0]['tal_barrio']; ?>
<<<<<<< HEAD
				</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" ><b>DIRECCIÓN DEL LOCAL COMERCIAL:</b></td>
	    <td  colspan="3"><?php if(isset($inspeccion['Local'][0])):?>
=======
				&nbsp;
				
			</td>
		</tr>
		<tr>
			<td class="bold">DIRECCIÓN DEL LOCAL COMERCIAL:</td>
			<td style='padding-left:40px;'>
				<?php if(isset($inspeccion['Local'][0])):?>
>>>>>>> 17357cb0d622aaf2d8798fd22651138313235c42
				<?php echo 'Calle / Avenida: ' . $inspeccion['Local'][0]['loc_calle_o_avenida']; ?>
				&nbsp;
				<?php echo 'Número: ' . $inspeccion['Local'][0]['loc_numero']; ?>
				&nbsp;
				<?php echo 'Intersección: ' . $inspeccion['Local'][0]['loc_interseccion']; ?>
				&nbsp;
				<?php echo 'Barrio: ' . $inspeccion['Local'][0]['loc_barrio']; ?>
				<?php endif;?>
<<<<<<< HEAD
				</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" ><b>CAPITAL INVERTIDO $:</b></td>
	    <td  colspan="3"><?php echo number_format($inspeccion['Calificacion']['cal_total_capital'], 2, ",", ".");?></td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" ><b>FECHA DE TITULACIÓN:</b></td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td ><b>Dr. Oswaldo Toledo Romo</b></td>
  	</tr>
  	<tr>
	  	<td colspan="2" ><b>FECHA DE EXPEDICIÓN:</b></td>
	   <td  colspan="3"><?php echo $inspeccion['Calificacion']['cal_fecha_expedicion'];?></td>
	    <td >&nbsp;</td>
	    <td ><b>SECRETARIO GENERAL</b></td>
  	</tr>
  	<tr>
	  	<td colspan="2" ><b>FECHA CADUCIDAD:</b></td>
	    <td  colspan="3"><?php
=======
				&nbsp;
			</td>
		</tr>
		<tr>
			<td class="bold">CAPITAL INVERTIDO $:</td>
			<td style='padding-left:40px;'>
				<?php echo number_format($inspeccion['Calificacion']['cal_total_capital'], 2, ",", ".");?>
			</td>
		</tr>
		<tr>
			<td class="bold">FECHA DE TITULACIÓN:</td>
			<td style='padding-left:40px;'></td>
		</tr>
		<tr>
			<td class="bold">FECHA EXPEDICIÓN</td>
			<td style='padding-left:40px;'>
				<?php echo $inspeccion['Calificacion']['cal_fecha_expedicion'];?>
			</td>
		</tr>
		<tr>
			<td class="bold">FECHA CADUCIDAD:</td>
			<td style='padding-left:40px;'>
				<?php
>>>>>>> 17357cb0d622aaf2d8798fd22651138313235c42
					if($inspeccion['Calificacion']['cal_fecha_expiracion'] == '3000-00-00') {
						echo 'Indefinida';
					} else {
						echo $inspeccion['Calificacion']['cal_fecha_expiracion'];
					}
<<<<<<< HEAD
				?></td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td ><b>Sr. Lenin Barba Galarza</b></td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td ><b>DIRECTOR TECNICO NACIONAL (E)</b></td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3">&nbsp;</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3" style="text-align: center;">DIOS, PATRIA Y LIBERTAD</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3" style=style="text-align: center;">POR LA JUNTA NACIONAL DE DEFENSA DEL ARTESANO</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" >&nbsp;</td>
	    <td  colspan="3" style="text-align: center;">REGISTRADO;</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	
</table>
=======
				?>
			</td>
		</tr>
	</table>
	<br />
	<p class='center'>
		DIOS, PATRIA Y LIBERTAD <br /> POR LA JUNTA NACIONAL DE DEFENSA DEL ARTESANO <br /> REGISTRADO:
	</p>
	
	<br /><br /><br /><br /><br />
	
	<table style="width:100%;">
		<tr>
			<td>
				<h5>Lic. Luis Quishpi Vélez </h5>
				<h5> VOCAL DEL EJECUTIVO-JNDA </h5>
				<br /><br />
			</td>
			<td align="right">
				<h5>Lic. Fausto Miranda Báez </h5>
				<h5> DELEGADO DEL IESS-JNDA </h5>
				<br /><br />
			</td>
		</tr>
		<tr>
			<td>
				<h5>Dr. Oswaldo Toledo Romo </h5>
				<h5> SECRETARIO GENERAL </h5>
			</td>
			<td align="right">
				<h5>Sr. Lenin Barba Galarza </h5>
				<h5> DIRECTOR TECNICO NACIONAL (E) </h5>
			</td>
		</tr>
	</table>
	
>>>>>>> 17357cb0d622aaf2d8798fd22651138313235c42
