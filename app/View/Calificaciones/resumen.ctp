<div class="calificaciones resumen">
	<legend>
		INFORMACIÓN SOBRE LAS INSPECCIONES
	</legend>
	<?php if(isset($calificacion['InspectorTaller']) && !empty($calificacion['InspectorTaller'])) :	?>
	<table>
		<caption>
			INSPECTOR ASIGNADO Y FECHA PARA EL TALLER
		</caption>
		<tr>
			<th>Numero De Identificación</th>
			<th>Nombres Y Apellidos</th>
			<th>Unidad</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<td><?php echo $calificacion['InspectorTaller']['usu_numero_identificacion'];?></td>
			<td><?php echo $calificacion['InspectorTaller']['usu_nombres_y_apellidos'];?></td>
			<td><?php echo $calificacion['InspectorTaller']['usu_unidad'];?></td>
			<td><?php echo $calificacion['Calificacion']['cal_fecha_inspeccion_taller'];?></td>
		</tr>
	</table>
	<?php endif;?>
	<?php if(isset($calificacion['InspectorLocal']) && !empty($calificacion['InspectorLocal'])) : ?>
	<table>
		<caption>
			INSPECTOR ASIGNADO Y FECHA PARA EL LOCAL
		</caption>
		<tr>
			<th>Numero De Identificación</th>
			<th>Nombres Y Apellidos</th>
			<th>Unidad</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<td><?php echo $calificacion['InspectorLocal']['usu_numero_identificacion'];?></td>
			<td><?php echo $calificacion['InspectorLocal']['usu_nombres_y_apellidos'];?></td>
			<td><?php echo $calificacion['InspectorLocal']['usu_unidad'];?></td>
			<td><?php echo $calificacion['Calificacion']['cal_fecha_inspeccion_local'];?></td>
		</tr>
	</table>
	<?php endif;?>
	<a class="button" target="_blank" href="/calificaciones/view/<?php echo $calificacion['Calificacion']['id'];?>">VER RESUMEN DE LA CALIFICACIÓN</a>
</div>
<!--<div class="debug-info">
	<?php debug($calificacion);?>
</div>-->