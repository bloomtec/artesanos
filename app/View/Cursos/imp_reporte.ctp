<h2><?php echo __('Reporte cursos');?></h2>
<table>
	<tr>
		<th>Solicitud</th>
		<th>Nombre></th>
		<th>Contenido</th>
		<th>Fecha inicio></th>
		<th>Fecha fin</th>
		<th>Jornada</th>
		<th>Num. horas</th>
		<th>Hora inicio</th>
		<th>Hora fin</th>
		<th>Provincia</th>
		<th>Num. Alumnos</th>
		<th>Fecha creación</th>
	</tr>
	<?php
for($i=0;$i < count($reporteCursos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteCursos[$i]["Solicitud"]["id"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_nombre"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_contenido"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_fecha_de_inicio"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_fecha_de_fin"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_jornada"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_numero_horas"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_horario_inicio"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_horario_fin"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Provincia"]["pro_nombre"]; ?></td>
		<td><?php echo $numAlumnos[$i]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["created"]; ?></td>
	</tr>
	<?php

	}
	?>
</table>

