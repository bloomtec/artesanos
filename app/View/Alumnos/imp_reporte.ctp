<h2><?php echo __('Reporte alumnos en cursos por provincia y fecha de creación'); ?></h2>
<table>
	<tr>
		<th>Doc. identificación</th>
		<th>Nacionalidad</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Sexo</th>
		<th>Fec. nacimiento</th>
		<th>Tip. sangre</th>
		<th>Estado civil</th>
		<th>Grado estudio</th>
		<th>Fecha creación</th>
	</tr>
	<?php
//debug($reporteIngresos);
for($i=0;$i < count($reporteAlumnos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_documento_de_identificacion"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_nacionalidad"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_nombres"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_apellido_paterno"].' '.$reporteAlumnos[$i]["Alumno"]["alu_apellido_materno"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_sexo"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_fecha_de_nacimiento"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_tipo_de_sangre"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_estado_civil"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_grado_de_estudio"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["created"]; ?></td>
	</tr>
	<?php

	}
	?>
</table>


