<table   border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="57" colspan="4"><center><b>CALIFICACIÓN TALLER ARTESANAL <br />
     Nro. <?php echo $inspeccion['Calificacion']['id']; ?></b>
    </center></td>
    <td width="169"><b>PERSONAL E
    INTRANSFERIBLE</b></td>
  </tr>
  <tr>
    <td height="19" colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="57" colspan="5"><center>La junta nacional de Defensa del Artesano, vista la solicitud de Calificación Nro. <?php echo $inspeccion['Calificacion']['cal_numero_valido']; ?> presentada el <?php echo $inspeccion['Calificacion']['created']; ?> previo el estudio e informe de la Unidad de Inspección y Calificación de Talleres Artesanales de laDirección Técnica, y de conformidad 
    con los Arts. 2 liberal b), y 15 de la Ley de 
    Defensa del Artesano y Art. 5 del<br />
    Reglamento de calificaciones y Ramas de Trabajos Vigentes
    </center></td>
  </tr>
  <tr>
    <td height="19" colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><center>
      <b>RESUELVE</b>
    </center></td>
  </tr>
  <tr>
    <td colspan="5"><center>Conceder el CERTIFICADO DE CALIFICACIÓN ARTESANAL, con derecho a los beneficios comtemplados en elinciso final del Art. 2, Arts. 16, 17, 18 y 19 de la Ley de Defensa del 
    Artesano, en concordancia con el Art. 302 delCódigo del Trabajo, Art. 367 de la Ley Orgánica del Régimen Municipal; Arts. 19 y 56, numeral 19 de la Ley deRégimen Tributario interno y Art. 171 de su reglamento a:
    </center></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="178">&nbsp;</td>
    <td colspan="2"><?php echo  $inspeccion['DatosPersonal'][0]['dat_nombres']
						. ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_paterno']
						. ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_materno']; 
		?><br/>
    <?php 
			if($inspeccion['Artesano']['art_is_cedula']){
				echo "CC # ";
			}else{
				echo "PASAPORTE # ";
			}
			echo $inspeccion['Artesano']['art_cedula'];
		?></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>RAMA ARTESANAL:</strong></td>
    <td><strong><?php echo $inspeccion["Rama"]["ram_nombre"]; ?></strong></td>
    <td colspan="2" rowspan="2"><strong>Lic. Luis Quishpi Vélez<br />PRESIDENTE</strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong>RAZÓN SOCIAL:</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>DIRECCIÓN DEL TALLER:</strong></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>DIRECCIÓN DEL LOCAL COMERCIAL:</strong></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>CAPITAL INVERTIDO $:</strong></td>
    <td><span style="padding-left:40px;"><?php echo number_format($inspeccion['Calificacion']['cal_total_capital'], 2, ",", ".");?></span></td>
    <td colspan="2" rowspan="2"><strong>Dr. Oswaldo Toledo Romo<br />SECRETARIO GENERAL</strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong>FECHA TITULACIÓN:</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>FECHA EXPEDICIÓN:</strong></td>
    <td><span style="padding-left:40px;"><?php echo $inspeccion['Calificacion']['cal_fecha_expedicion'];?></span></td>
    <td colspan="2" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>FECHA CADUCIDAD:</strong></td>
    <td><span style="padding-left:40px;">
      <?php
					if($inspeccion['Calificacion']['cal_fecha_expiracion'] == '3000-00-00') {
						echo 'Indefinida';
					} else {
						echo $inspeccion['Calificacion']['cal_fecha_expiracion'];
					}
				?>
    </span></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="2"><strong>Sr. Lenin Barba Galarza<br />DIRECTOR TECNICO NACIONAL (E)</strong></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td width="411">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td rowspan="4"><strong><center></center></strong></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>