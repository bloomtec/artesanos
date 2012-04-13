<table border="0" width="700">
	<tr>
		<td rowspan="2" width="100"><b>imagen1</b></td>
		<td width="700" style="text-align: center; font-size:80px;"><b>JUNTA NACIONAL DE DEFENSA DEL ARTESANO</b></td>
	</tr>
	<tr>
		<td width="700" style="text-align: center; font-size:40px;">PLAN NACIONAL DE CAPACITACIÓN, DIRIGIDO A TODOS LOS ARTESANOS DEL PAÍS<br />
                 CUMPLIDOS CON TODOS LOS REQUISITOS ESTIPULADOS POR LA J.N.D.A CONFIERE EL PRESENTE:
		</td>
	</tr>
</table>
<br>
<table border="0" width="700">
	<tr>
		<td rowspan="2" width="100"><b>imagen2</b></td>
		<td rowspan="2" width="700" style="text-align: center; font-size:160px;"><b>CERTIFICADO</b></td>
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
		<td width="632" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;"><?php echo $curso[0]["Curso"]["cur_nombre"]; ?></div></td>
	</tr>
	
</table>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td width="800" ><div style="text-align: left; font-size:38px;"><b>Con el siguiente contenido:</b></div></td>
	</tr>
</table>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td width="800" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;">&nbsp;</div></td>
	</tr>
	<tr>
		<td width="800" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;">&nbsp;</div></td>
	</tr>
</table>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="125" style="text-align: left; font-size:38px;"><b>Dado y firmado en:</b></td>
		<td width="225" ><div style="text-align: center; font-size:38px; border-bottom: 1px solid black;">QUITO</div></td>
		<td width="30" ><div style="text-align: center; font-size:38px;"><b>de</b></div></td>
		<td width="290" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black; text-align: left;"><?php echo "'".$fecha2."''"; ?></div></td>
		<td width="30" ><div style="text-align: center; font-size:38px;"><b><?php echo $fecha[2]; ?></b></div></td>
		<td width="100" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;">&nbsp;</div></td>
	</tr>
</table>
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="140" style="text-align: left; font-size:38px;"><b>Con una duracion de:</b></td>
		<td width="120" ><div style="text-align: left; font-size:38px; border-bottom: 1px solid black;"><?php echo $curso[0]["Curso"]["numero_horas"]; ?></div></td>
		<td width="200" ><div style="text-align: left; font-size:38px;"><b>Horas.</b></div></td>
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
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="228" style="text-align: center; font-size:38px;"><b>Gonzalo Borja Paredes</b><br>PRESIDENTE DE LA JUNTA J.N.D.A</td>
		<td  width="342" style="text-align: center; font-size:38px;"><b>Rocío Almeida Beltrán</b><br />SECRETARIA DE LA J.N.D.A</td>
		<td  width="228" style="text-align: center; font-size:38px;"><b>Ángel Ortiz Sánchez</b><br />JEFE DE CAPACITACIÓN J.N.D.A</td>	
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
<table border="0"  cellspacing="0" cellpadding="0">
	<tr>
		<td  width="400" style="text-align: center; font-size:38px;">DIRECTOR/A TÉCNICO/A DE LA J.N.D.A</td>
		<td  width="400" style="text-align: center; font-size:38px;"><?php echo strtoupper($curso[0]["Instructor"]["ins_nombres"].' '.$curso[0]["Instructor"]["ins_apellido_paterno"].' '.$curso[0]["Instructor"]["ins_apellido_materno"]); ?></td>
	</tr>
</table>
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