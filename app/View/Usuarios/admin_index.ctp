<div class="usuarios index">
	<h2><?php echo __('Usuarios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('usuario');?></th>
			<th><?php echo $this->Paginator->sort('contraseña');?></th>
			<th><?php echo $this->Paginator->sort('ciudad_id');?></th>
			<th><?php echo $this->Paginator->sort('ubicacion_id');?></th>
			<th><?php echo $this->Paginator->sort('sector_id');?></th>
			<th><?php echo $this->Paginator->sort('rol_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['usuario']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['contraseña']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usuario['Ciudad']['nombre'], array('controller' => 'ciudades', 'action' => 'view', $usuario['Ciudad']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usuario['Ubicacion']['nombre'], array('controller' => 'ubicaciones', 'action' => 'view', $usuario['Ubicacion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usuario['Sector']['nombre'], array('controller' => 'sectores', 'action' => 'view', $usuario['Sector']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usuario['Rol']['nombre'], array('controller' => 'roles', 'action' => 'view', $usuario['Rol']['id'])); ?>
		</td>
		<td><?php echo h($usuario['Usuario']['created']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('controller' => 'ciudades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudad'), array('controller' => 'ciudades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ubicaciones'), array('controller' => 'ubicaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ubicacion'), array('controller' => 'ubicaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sectores'), array('controller' => 'sectores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sector'), array('controller' => 'sectores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rol'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inspecciones'), array('controller' => 'inspecciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
