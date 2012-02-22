<div class=" informe">
	<table>
		<tr>
			<th><?php echo $this -> Paginator -> sort('dat_nombres', 'Nombre');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_apellido_paterno', 'Apellido Paterno');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_apellido_materno', 'Apellido Materno');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_nacionalidad', 'Nacionalidad');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_cedula', 'Cédula');?></th>
			<th><?php echo $this -> Paginator -> sort('modified', 'Fecha');?></th>
		</tr>
		<?php foreach ($artesanos as $artesano): ?>
		<tr>
			<td><?php echo h($artesano['DatosPersonal']['dat_nombres']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_apellido_paterno']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_apellido_materno']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_nacionalidad']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_cedula']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['modified']);?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'reportes', 'action' => 'reporteArtesanos'), array('class' => 'prev button')); ?> </li>
	</ul>
</div>