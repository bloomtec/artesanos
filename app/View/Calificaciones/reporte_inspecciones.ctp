<div class=" informe">
	<table>
		<tr>
			<th><?php echo $this -> Paginator -> sort('cal_nombre_artesano', 'Nombre Artesano');?></th>
			<th>Taller</th>
			<th>Local</th>
			<th><?php echo $this -> Paginator -> sort('cal_estado', 'Estado Calificación');?></th>
		</tr>
		<?php foreach ($calificaciones as $calificacion):
		?>
		<tr>
			<td><?php echo h($calificacion['Calificacion']['cal_nombre_artesano']);?>&nbsp;</td>
			<td>
			<table class="inspeccion">
				<tr>
					<th><?php echo $this -> Paginator -> sort('cal_nombre_inspector_taller', 'Inspector');?></th>
				</tr>
				<tr>
					<td><?php echo h($calificacion['Calificacion']['cal_nombre_inspector_taller']);?>&nbsp;</td>
				</tr>
				<tr>
					<th><?php echo $this -> Paginator -> sort('cal_fecha_inspeccion_taller', 'Fecha');?></th>
				</tr>
				<tr>
					<td><?php echo h($calificacion['Calificacion']['cal_fecha_inspeccion_taller']);?>&nbsp;</td>
				</tr>
				<tr>
					<th><?php echo $this -> Paginator -> sort('cal_taller_aprobado', 'Estado');?></th>
				</tr>
				<tr>
					<td><?php
					if ($calificacion['Calificacion']['cal_taller_aprobado'] == 1) {
						echo h('Aprobado');
					} elseif ($calificacion['Calificacion']['cal_taller_aprobado'] == -1) {
						echo h('Denegado');
					} else {
						echo h('Pendiente');
					}
					;
					?>
					&nbsp;</td>
				</tr>
				<tr>
					<th><?php echo $this -> Paginator -> sort('cal_comentarios_taller', 'Comentarios');?></th>
				</tr>
				<tr>
					<td><?php echo $calificacion['Calificacion']['cal_comentarios_taller'];?></td>
				</tr>
				<tr>
					<td><?php
					if (!empty($calificacion['Calificacion']['cal_nombre_inspector_taller']))
						echo $this -> Html -> link(__('Ver Inspección Taller'), array('controller' => 'calificaciones', 'action' => 'verInspeccion', $calificacion['Calificacion']['id'], 1));
					?></td>
				</tr>
			</table></td>
			<td>
			<table class="inspeccion">
				<tr>
					<th><?php echo $this -> Paginator -> sort('cal_nombre_inspector_local', 'Inspector');?></th>
				</tr>
				<tr>
					<td><?php echo h($calificacion['Calificacion']['cal_nombre_inspector_local']);?>&nbsp;</td>
				</tr>
				<tr>
					<th><?php echo $this -> Paginator -> sort('cal_fecha_inspeccion_local', 'Fecha');?></th>
				</tr>
				<tr>
					<td><?php echo h($calificacion['Calificacion']['cal_fecha_inspeccion_local']);?>&nbsp;</td>
				</tr>
				<tr>
					<th><?php echo $this -> Paginator -> sort('cal_local_aprobado', 'Estado');?></th>
				</tr>
				<tr>
					<td><?php
					if (!empty($calificacion['Calificacion']['cal_local_aprobado'])) {
						if ($calificacion['Calificacion']['cal_local_aprobado'] == 1) {
							echo h('Aprobado');
						} elseif ($calificacion['Calificacion']['cal_local_aprobado'] == -1) {
							echo h('Denegado');
						} else {
							echo h('Pendiente');
						}
					};
					?>
					&nbsp;</td>
				</tr>
				<tr>
					<th><?php echo $this -> Paginator -> sort('cal_comentarios_local', 'Comentarios');?></th>
				</tr>
				<tr>
					<td><?php echo $calificacion['Calificacion']['cal_comentarios_local'];?></td>
				</tr>
				<tr>
					<td><?php
					if (!empty($calificacion['Calificacion']['cal_nombre_inspector_local']))
						echo $this -> Html -> link(__('Ver Inspección Local'), array('controller' => 'calificaciones', 'action' => 'verInspeccion', $calificacion['Calificacion']['id'], 2));
					?></td>
				</tr>
			</table></td>
			<td><?php
			if ($calificacion['Calificacion']['cal_estado'] == 1) {
				echo h('Aprobado');
			} elseif ($calificacion['Calificacion']['cal_estado'] == -1) {
				echo h('Denegado');
			} elseif ($calificacion['Calificacion']['cal_estado'] == -2) {
				echo h('Deshabilitado');
			} else {
				echo h('Pendiente');
			}
			;
			?>
			&nbsp;</td>
		</tr>
		<?php endforeach;?>
	</table>
	<div class="paging">
		<?php
		echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Volver'), array('controller' => 'reportes', 'action' => 'reporteInspecciones'), array('class' => 'prev button'));?>
		</li>
	</ul>
</div>
<div class="csv-export">
	<?php
	$fields = urlencode('cal_nombre_artesano,cal_estado,cal_nombre_inspector_taller,cal_fecha_inspeccion_taller,cal_taller_aprobado,cal_comentarios_taller,cal_nombre_inspector_local,cal_fecha_inspeccion_local,cal_local_aprobado,cal_comentarios_local');
	$headers = urlencode('Nombre Artesano,Estado Calificación,Inspector Taller,Fecha Inspección Taller,Estado Inspección Taller,Comentarios Taller,Inspector Local,Fecha Inspección Local,Estado Inspección Local,Comentarios Local');
	echo $this -> Html -> link('Exportar el resultado a CSV', array('action' => 'CSVExport', 'fields' => $fields, 'headers' => $headers), array('class' => 'button'));
	?>
</div>