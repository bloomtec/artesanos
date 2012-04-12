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
	  	<span>Conceder el CERTIFICADO DE CALIFICACIÓN ARTESANAL AUTONOMO, con derecho a los beneficios comtemplados en el inciso final del Art. 2, Arts. 16, 17, 18 y 19 de la Ley de Defensa del Artesano, en concordancia con el Art. 302 del Código del Trabajo, Art. 367 de la Ley Orgánica del Régimen Municipal; Arts. 19 y 56, numeral 19 de la Ley de Régimen Tributario interno y Art. 171 de su reglamento a:</span>
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
				&nbsp;
				<?php echo 'Número: ' . $inspeccion['Taller'][0]['tal_numero']; ?>
				&nbsp;
				<?php echo 'Intersección: ' . $inspeccion['Taller'][0]['tal_interseccion']; ?>
				&nbsp;
				<?php echo 'Barrio: ' . $inspeccion['Taller'][0]['tal_barrio']; ?>
				</td>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
  	</tr>
  	<tr>
	  	<td colspan="2" ><b>DIRECCIÓN DEL LOCAL COMERCIAL:</b></td>
	    <td  colspan="3"><?php if(isset($inspeccion['Local'][0])):?>
				<?php echo 'Calle / Avenida: ' . $inspeccion['Local'][0]['loc_calle_o_avenida']; ?>
				&nbsp;
				<?php echo 'Número: ' . $inspeccion['Local'][0]['loc_numero']; ?>
				&nbsp;
				<?php echo 'Intersección: ' . $inspeccion['Local'][0]['loc_interseccion']; ?>
				&nbsp;
				<?php echo 'Barrio: ' . $inspeccion['Local'][0]['loc_barrio']; ?>
				<?php endif;?>
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
					if($inspeccion['Calificacion']['cal_fecha_expiracion'] == '3000-00-00') {
						echo 'Indefinida';
					} else {
						echo $inspeccion['Calificacion']['cal_fecha_expiracion'];
					}
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