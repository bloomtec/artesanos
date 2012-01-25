<div class="ubicaciones view">
<h2><?php  echo __('Ubicacion');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ubicacion['Ubicacion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ubicacion['Ubicacion']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($ubicacion['Ubicacion']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ubicacion['Ubicacion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ubicacion['Ubicacion']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ubicacion'), array('action' => 'edit', $ubicacion['Ubicacion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ubicacion'), array('action' => 'delete', $ubicacion['Ubicacion']['id']), null, __('Are you sure you want to delete # %s?', $ubicacion['Ubicacion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ubicaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ubicacion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Usuarios');?></h3>
	<?php if (!empty($ubicacion['Usuario'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usuario'); ?></th>
		<th><?php echo __('Contraseña'); ?></th>
		<th><?php echo __('Ciudad Id'); ?></th>
		<th><?php echo __('Ubicacion Id'); ?></th>
		<th><?php echo __('Sector Id'); ?></th>
		<th><?php echo __('Rol Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ubicacion['Usuario'] as $usuario): ?>
		<tr>
			<td><?php echo $usuario['id'];?></td>
			<td><?php echo $usuario['usuario'];?></td>
			<td><?php echo $usuario['contraseña'];?></td>
			<td><?php echo $usuario['ciudad_id'];?></td>
			<td><?php echo $usuario['ubicacion_id'];?></td>
			<td><?php echo $usuario['sector_id'];?></td>
			<td><?php echo $usuario['rol_id'];?></td>
			<td><?php echo $usuario['created'];?></td>
			<td><?php echo $usuario['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'usuarios', 'action' => 'view', $usuario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'usuarios', 'action' => 'edit', $usuario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'usuarios', 'action' => 'delete', $usuario['id']), null, __('Are you sure you want to delete # %s?', $usuario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
