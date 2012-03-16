<h1 style='margin-top:100px;'>CALIFICACION TALLER ARTESANAL</h1>
	<h1>Nro. <?php echo $inspeccion['Calificacion']['id']; ?> </h1>
	
	<!--<h1 class='right' style='color:red; font-size: 12px;'> DEFINIR A QUE HACE REFENCIA ESTE NUMERO </h1> -->
	<h1 class='right'> PERSONAL E</h1> 
	<h1 class='right'> INSTRANFERIBLE</h1>
	
	<p>
	 La Junta Nacional de Defensa del Artesano, vista la solicitud de Clificación Nro. <?php echo $inspeccion['Calificacion']['cal_numero_valido']; ?>&nbsp;
	presentada el <?php echo $inspeccion['Calificacion']['created']; ?>&nbsp;
	previo el estudio e informe de la Unidad de Inpección y Calificación de Talleres Artesanales de la Dirección Técnica, y de conformidad al Art. 5 del Reglamento de Calificaciones y Ramas de Trabajo Vigente.
	</p>
	
	<h1>RESUELVE</h1>
	
	<p>
		Conceder el CERTIFICADO DE CALIFICACIÓN ARTESANAL AUTONOMO , con derecho a los beneficios contemplados en el inciso final del Art. 2, Arts. 16, 17, 18 y 19 de la Ley de Defensa del Artesano,
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
		?> 
	</h1>
	<br />
	<table>
		<tr>
			<td class="bold">RAMA ARTESANAL:</td>
			<td style='padding-left:40px;'><?php echo $inspeccion['Rama']['ram_nombre']; ?></td>
		</tr>
		<tr>
			<td class="bold">RAZÓN SOCIAL:</td>
			<td style='padding-left:40px;'> <?php echo $inspeccion['Taller'][0]['tal_razon_social_o_nombre_comercial']; ?></td>
		</tr>
		<tr>
			<td class="bold">DIRECCIÓN DEL TALLER:</td>
			<td style='padding-left:40px;'>
				<?php echo 'Calle / Avenida: ' . $inspeccion['Taller'][0]['tal_calle_o_avenida']; ?>
				&nbsp;
				<?php echo 'Número: ' . $inspeccion['Taller'][0]['tal_numero']; ?>
				&nbsp;
				<?php echo 'Intersección: ' . $inspeccion['Taller'][0]['tal_interseccion']; ?>
				&nbsp;
				<?php echo 'Barrio: ' . $inspeccion['Taller'][0]['tal_barrio']; ?>
				&nbsp;
				
			</td>
		</tr>
		<tr>
			<td class="bold">DIRECCIÓN DEL LOCAL COMERCIAL:</td>
			<td style='padding-left:40px;'>
				<?php if(isset($inspeccion['Local'][0])):?>
				<?php echo 'Calle / Avenida: ' . $inspeccion['Local'][0]['loc_calle_o_avenida']; ?>
				&nbsp;
				<?php echo 'Número: ' . $inspeccion['Local'][0]['loc_numero']; ?>
				&nbsp;
				<?php echo 'Intersección: ' . $inspeccion['Local'][0]['loc_interseccion']; ?>
				&nbsp;
				<?php echo 'Barrio: ' . $inspeccion['Local'][0]['loc_barrio']; ?>
				<?php endif;?>
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
			<td></td>
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
				<?php echo $inspeccion['Calificacion']['cal_fecha_expiracion'];?>
			</td>
		</tr>
	</table>
	<br />
	<p class='center'>
		DIOS, PATRIA Y LIBERTAD <br /> POR LA JUNTA NACIONAL DE DEFENSA DEL ARTESANO <br /> REGISTRADO:
	</p>
	<br />

	
	<h2 class='center'> Lic. Luis Quishpi Vélez</h2>
	<h2 class='center'> PRESIDENTE DE LA JNDA</h2>
	

	<br />
	
	<table style="width:100%;">
		<tr>
			<td>
				<h2>Dr. Oswaldo Toledo Romo </h2>
				<h2> SECRETARIO GENERAL </h2>
			</td>
			<td align="right">
				<h2>Sr. Lenin Barba Galarza </h2>
				<h2> DIRECTOR TECNICO NACIONAL (E) </h2>
			</td>
		</tr>
	</table>
	