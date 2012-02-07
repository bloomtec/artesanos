<div class="datosPersonales index">
	<h2><?php echo __('Datos Personales');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('calificacion_id');?></th>
							<th><?php echo $this->Paginator->sort('dat_apellido_paterno');?></th>
							<th><?php echo $this->Paginator->sort('dat_apellido_materno');?></th>
							<th><?php echo $this->Paginator->sort('dat_nombres');?></th>
							<th><?php echo $this->Paginator->sort('dat_nacionalidad');?></th>
							<th><?php echo $this->Paginator->sort('dat_fecha_nacimiento');?></th>
							<th><?php echo $this->Paginator->sort('dat_estado_civil');?></th>
							<th><?php echo $this->Paginator->sort('dat_grado_estudio');?></th>
							<th><?php echo $this->Paginator->sort('dat_sexo');?></th>
							<th><?php echo $this->Paginator->sort('dat_hijos_mayores');?></th>
							<th><?php echo $this->Paginator->sort('dat_hijos_menores');?></th>
							<th><?php echo $this->Paginator->sort('dat_tipo_discapacidad');?></th>
							<th><?php echo $this->Paginator->sort('dat_porcentaje_de_discapacidad');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($datosPersonales as $datosPersonal): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($datosPersonal['Calificacion']['id'], array('controller' => 'calificaciones', 'action' => 'view', $datosPersonal['Calificacion']['id'])); ?>
		</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_apellido_paterno']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_apellido_materno']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_nombres']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_nacionalidad']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_fecha_nacimiento']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_estado_civil']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_grado_estudio']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_sexo']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_hijos_mayores']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_hijos_menores']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_tipo_discapacidad']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['dat_porcentaje_de_discapacidad']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['created']); ?>&nbsp;</td>
		<td><?php echo h($datosPersonal['DatosPersonal']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $datosPersonal['DatosPersonal']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $datosPersonal['DatosPersonal']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $datosPersonal['DatosPersonal']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $datosPersonal['DatosPersonal']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>


	<div class="paging">
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
	));
	?>	</p>-->
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Datos Personal'), array('action' => 'add')); ?></li>
	</ul>
</div>
