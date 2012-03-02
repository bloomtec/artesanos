<div class=" informe">
	<div class="csv-export">
		<?php
			$fields = urlencode('dat_nombres,dat_apellido_paterno,dat_apellido_materno,dat_nacionalidad,dat_cedula,modified');
			$headers = urlencode('Nombre,Apellido Paterno,Apellido Materno,Nacionalidad,Cédula,Última Modificación');
			echo $this -> Html -> link('Exportar el resultado a CSV', array('action' => 'CSVExport', 'fields'=>$fields, 'headers'=>$headers),array('class'=>'csv'));
		?>
	</div>
	<table>
		<tr>
			<th><?php echo $this -> Paginator -> sort('dat_nombres', 'Nombre');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_apellido_paterno', 'Apellido Paterno');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_apellido_materno', 'Apellido Materno');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_nacionalidad', 'Nacionalidad');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_cedula', 'Cédula');?></th>
			<th><?php echo $this -> Paginator -> sort('modified', 'Última Modificación');?></th>
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
			echo $this -> Paginator -> first('<<  ', array(), null, array('class' => 'prev disabled'));
			echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this -> Paginator -> numbers(array('separator' => ''));
			echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
			echo $this -> Paginator->last('>>  ', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'reportes', 'action' => 'reporteArtesanos'), array('class' => 'prev button')); ?> </li>
	</ul>
</div>