
<h1>Calificacion taller artesanal</h1>
<h1>Nro. <?php $inspeccion['Calificacion']['id']; ?> </h1>

<h1 class='right'> NO SE ESTE NÚMERO A QUE SE REFIERE</h1>
<h1 class='right'> PERSONAL E</h1> 
<h1 class='right'> INSTRANFERIBLE</h1>

<p>
 La Junta Nacional de Defensa del Artesano, vista la solicitud de Clificación Nro. <?php $inspeccion['Calificacion']['cal_numero_valido']; ?>
presentada el <?php $inspeccion['Calificacion']['created']; ?>
previo el estudio e informe de la Unidad de Inpección y Calificación de Talleres Artesanales de la Dirección Técnica, y de conformidad al Art. 5 del Reglamento de Calificaciones y Ramas de Trabajo Vigente.
</p>

<h1>RESUELVE</h1>

<p>
	Conceder el CERTIFICADO DE CALIFICACIÓN ARTESANAL <?php if($inspeccion['Calificacion']['tipos_de_calificacion_id']==2) echo "AUTONOMO"; ?> , con derecho a los beneficios contemplados en el inciso final del Art. 2, Arts. 16, 17, 18 y 19 de la Ley de Defensa del Artesano,
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
			echo "CC #";
		}else{
			echo "PASAPORTE #";
		}
		echo $inspeccion['Artesano']['art_cedula'];
	?> 
</h1>

<table>
	<tr>
		<td>RAMA ARTESANAL:</td>
		<td><?php echo $inspeccion['Rama']['ram_nombre']; ?></td>
	</tr>
	<tr>
		<td>RAZÓN SOCIAL:</td>
		<td><?php echo $inspeccion['Taller'][0]['tal_razon_social_o_nombre_comercial']; ?></td>
	</tr>
	<tr>
		<td>DIRECCIÓN DEL TALLER:</td>
		<td>
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
		<td>DIRECCIÓN DEL LOCAL COMERCIAL:</td>
		<td>
			<?php echo 'Calle / Avenida: ' . $inspeccion['Local'][0]['loc_calle_o_avenida']; ?>
			&nbsp;
			<?php echo 'Número: ' . $inspeccion['Local'][0]['loc_numero']; ?>
			&nbsp;
			<?php echo 'Intersección: ' . $inspeccion['Local'][0]['loc_interseccion']; ?>
			&nbsp;
			<?php echo 'Barrio: ' . $inspeccion['Local'][0]['loc_barrio']; ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td>CAPITAL INVERTIDO $:</td>
		<td>
			<?php echo $inspeccion['Calificacion']['cal_total_capital'];?>
		</td>
	</tr>
	<tr>
		<td>FECHA DE TITULACIÓN:</td>
		<td></td>
	</tr>
	<tr>
		<td>FECHA EXPEDICIÓN</td>
		<td>
			<?php echo $inspeccion['Calificacion']['cal_fecha_expedicion'];?>
		</td>
	</tr>
	<tr>
		<td>FECHA CADUCIDAD:</td>
		<td>
			<?php echo $inspeccion['Calificacion']['cal_fecha_expiracion'];?>
		</td>
	</tr>
</table>

<p class='center'>
	DIOS, PATRIA Y LIBERTAD <br /> POR LA JUNTA NACIONAL DE DEFENSA DEL ARTESANO <br /> REGISTRADO:
</p>
