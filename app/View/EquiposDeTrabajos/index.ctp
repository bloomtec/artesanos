<div class="equiposDeTrabajos index">
	<h2><?php echo __('Equipos De Trabajos');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('taller_id');?></th>
							<th><?php echo $this->Paginator->sort('equ_cantidad');?></th>
							<th><?php echo $this->Paginator->sort('equ_maquinaria_y_herramientas');?></th>
							<th><?php echo $this->Paginator->sort('equ_tipo_de_adquisicion');?></th>
							<th><?php echo $this->Paginator->sort('equ_fecha_de_adquisicion');?></th>
							<th><?php echo $this->Paginator->sort('equ_valor_comercial');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($equiposDeTrabajos as $equiposDeTrabajo): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($equiposDeTrabajo['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $equiposDeTrabajo['Taller']['id'])); ?>
		</td>
		<td><?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_cantidad']); ?>&nbsp;</td>
		<td><?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_maquinaria_y_herramientas']); ?>&nbsp;</td>
		<td><?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_tipo_de_adquisicion']); ?>&nbsp;</td>
		<td><?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_fecha_de_adquisicion']); ?>&nbsp;</td>
		<td><?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_valor_comercial']); ?>&nbsp;</td>
		<td><?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['created']); ?>&nbsp;</td>
		<td><?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $equiposDeTrabajo['EquiposDeTrabajo']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $equiposDeTrabajo['EquiposDeTrabajo']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $equiposDeTrabajo['EquiposDeTrabajo']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $equiposDeTrabajo['EquiposDeTrabajo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Equipos De Trabajo'), array('action' => 'add')); ?></li>
	</ul>
</div>
