<div class=" informe">
	<table>
		<tr>
			<th><?php echo $this -> Paginator -> sort('id', 'Código');?></th>
			<th><?php echo $this -> Paginator -> sort('created', 'Fecha De Expedición');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_fecha_expiracion', 'Fecha De Expiración');?></th>
			<th><?php echo $this -> Paginator -> sort('rama_id', 'Rama');?></th>
			<th><?php echo $this -> Paginator -> sort('tipos_de_calificacion_id', 'Tipo De Artesano');?></th>
			<th></th>
		</tr>
		<?php foreach ($calificaciones as $calificacion): ?>
		<tr>
			<td><?php echo h($calificacion['Calificacion']['id']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['created']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['cal_fecha_expiracion']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['rama_id']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['tipos_de_calificacion_id']);?>&nbsp;</td>
			<td>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'reportes', 'action' => 'reporteCalificacionesOperador'), array('class' => 'prev button')); ?> </li>
	</ul>
</div>