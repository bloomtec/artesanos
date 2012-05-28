<!-- saca todos los cursos del alumno y pone la nota que tiene el alumno -->
<h2><?php echo __('Reporte notas alumnos');?></h2>
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
		<th>Cursos - Nota</th>
		<th>Fecha creación</th>
	</tr>
	<?php
for($i=0;$i < count($reporteNotasAlumnos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_documento_de_identificacion"]; ?></td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_nacionalidad"]; ?></td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_nombres"]; ?></td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_apellido_paterno"].' '.$reporteNotasAlumnos[$i]["Alumno"]["alu_apellido_materno"]; ?></td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_sexo"]; ?></td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_fecha_de_nacimiento"]; ?></td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_tipo_de_sangre"]; ?></td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_estado_civil"]; ?></td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["alu_grado_de_estudio"]; ?></td>
		<td>
		<?php
			for($j=0;$j < count($reporteNotasAlumnos[$i]["Curso"]);$j++) {
				
				echo $reporteNotasAlumnos[$i]["Curso"][$j]["cur_nombre"].', nota:'.$reporteNotasAlumnos[$i]["Curso"][$j]["CursosAlumno"]["cur_nota_final"];
				echo "<br>";
			}
		?>
			
	  </td>
		<td><?php echo $reporteNotasAlumnos[$i]["Alumno"]["created"]; ?></td>
	</tr>
	<?php

	}
	?>
</table>


