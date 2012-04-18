<table border="0" width="700">
	<tr>
		<td rowspan="2" width="140"><br><img src="img/logo_header.jpg" width="150px"/></td>
		<td width="660" style="text-align: center; font-size:75px;"><b>JUNTA NACIONAL DE DEFENSA DEL ARTESANO</b></td>
	</tr>
	<tr>
		<td width="660" style="text-align: center; font-size:35px;">PLAN NACIONAL DE CAPACITACIÓN, DIRIGIDO A TODOS LOS ARTESANOS DEL PAÍS<br />
                 CUMPLIDOS CON TODOS LOS REQUISITOS ESTIPULADOS POR LA J.N.D.A CONFIERE EL PRESENTE:
		</td>
	</tr>
</table>
<br>
<br>
<br>
<table border="0" width="700">
	<tr>
		<td rowspan="2" width="100"><b>&nbsp;</b></td>
		<td rowspan="2" width="700" style="text-align: center; font-size:125px;"><b>CERTIFICADO</b></td>
	</tr>
</table>

<br>
<br>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="22" style="text-align: left; font-size:38px;"><b>A:</b></td>
		<td width="778" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;"><?php echo $alumno["Alumno"]["alu_nombres"].' '.$alumno["Alumno"]["alu_apellido_paterno"].' '.$alumno["Alumno"]["alu_apellido_materno"]; ?></div></td>
	</tr>

</table>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="168" style="text-align: left; font-size:38px;"><b>quien asistió al curso de:</b></td>
		<td width="632" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;"><?php echo $alumno["Curso"]["cur_nombre"]; ?></div></td>
	</tr>
	
</table>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td width="800" ><div style="text-align: left; font-size:38px;"><b>Con el siguiente contenido:</b></div></td>
	</tr>
</table>
<br>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td width="800" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;"><?php print($alumno["Curso"]["cur_contenido"]); ?></div></td>
	</tr>
	<tr>
		<td width="800" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;">&nbsp;</div></td>
	</tr>
</table>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="125" style="text-align: left; font-size:38px;"><b>Dado y firmado en:</b></td>
		<td width="50" ><div style="text-align: center; font-size:38px; border-bottom: 1px solid black;">QUITO</div></td>
		<td width="30" ><div style="text-align: center; font-size:38px;"></div></td>
		<td width="180" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black; text-align: center;"><?php print($fecha2.' '.$fecha[2]); ?></div></td>
		<td width="150" ><div style="text-align: center; font-size:38px;"><b>Con una duracion de:</b></div></td>
		<td width="60" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black; text-align: center;"><?php echo print($alumno["Curso"]["cur_numero_horas"]); ?></div></td>
		<td width="100" ><div style="text-align: left; font-size:38px;"><b>Horas.</b></div></td>
	</tr>
</table>
<!--
<table border="1"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="140" style="text-align: left; font-size:38px;"><b>Con una duracion de:</b></td>
		<td width="180" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;"><?php echo $alumno["Curso"]["cur_numero_horas"]; ?></div></td>
		<td width="200" ><div style="text-align: left; font-size:38px;"><b>Horas.</b></div></td>
	</tr>
</table> -->
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
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="228" style="text-align: center; font-size:38px;"><b><?php print($presidente); ?></b><br>PRESIDENTE DE LA JUNTA J.N.D.A</td>
		<td  width="342" style="text-align: center; font-size:38px;"><b><?php print($tecnico); ?></b><br />TÉCNICO EN CAPACITACIÓN Y CALIFICACIÓN</td>
		<td  width="228" style="text-align: center; font-size:38px;"><b><?php echo  $instructor; ?></b><br />INSTRUCTOR J.N.D.A</td>	
	</tr>
</table>

<br>
<br>
<br>
<br>
<br>
<br>
<!--
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="400" style="text-align: center; font-size:38px;">DIRECTOR/A TÉCNICO/A DE LA J.N.D.A</td>
		<td  width="400" style="text-align: center; font-size:38px;"><?php echo strtoupper($alumno["Instructor"]["ins_nombres"].' '.$alumno["Instructor"]["ins_apellido_paterno"].' '.$alumno["Instructor"]["ins_apellido_materno"]); ?></td>
	</tr>
</table> -->
<br>
<br>
<br>
<br>
<br>
<br>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="800" style="text-align: center; font-size:38px;"><i><b>TECNIFICADO Y CAPACITADO PARA EL DESARROLLO DEL SECTOR ARTESANAL DEL ECUADOR</b></i></td>
	</tr>
</table>