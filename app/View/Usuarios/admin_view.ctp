<div class="usuarios view">
<h2><?php  echo __('Usuario');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contraseña'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['contraseña']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Ciudad']['nombre'], array('controller' => 'ciudades', 'action' => 'view', $usuario['Ciudad']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ubicacion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Ubicacion']['nombre'], array('controller' => 'ubicaciones', 'action' => 'view', $usuario['Ubicacion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sector'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Sector']['nombre'], array('controller' => 'sectores', 'action' => 'view', $usuario['Sector']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rol'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Rol']['nombre'], array('controller' => 'roles', 'action' => 'view', $usuario['Rol']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Inspecciones');?></h3>
	<?php if (!empty($usuario['Inspeccion'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Artesano Id'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th><?php echo __('Local Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usuario['Inspeccion'] as $inspeccion): ?>
		<tr>
			<td><?php echo $inspeccion['id'];?></td>
			<td><?php echo $inspeccion['usuario_id'];?></td>
			<td><?php echo $inspeccion['artesano_id'];?></td>
			<td><?php echo $inspeccion['taller_id'];?></td>
			<td><?php echo $inspeccion['local_id'];?></td>
			<td><?php echo $inspeccion['created'];?></td>
			<td><?php echo $inspeccion['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'inspecciones', 'action' => 'view', $inspeccion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'inspecciones', 'action' => 'edit', $inspeccion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'inspecciones', 'action' => 'delete', $inspeccion['id']), null, __('Are you sure you want to delete # %s?', $inspeccion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
