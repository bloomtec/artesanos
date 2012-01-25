<div class="ramas view">
<h2><?php  echo __('Rama');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rama['Rama']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($rama['Rama']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($rama['Rama']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($rama['Rama']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($rama['Rama']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rama'), array('action' => 'edit', $rama['Rama']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rama'), array('action' => 'delete', $rama['Rama']['id']), null, __('Are you sure you want to delete # %s?', $rama['Rama']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ramas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rama'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calificaciones'), array('controller' => 'calificaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calificacion'), array('controller' => 'calificaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Calificaciones');?></h3>
	<?php if (!empty($rama['Calificacion'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Rama Id'); ?></th>
		<th><?php echo __('Expiracion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($rama['Calificacion'] as $calificacion): ?>
		<tr>
			<td><?php echo $calificacion['id'];?></td>
			<td><?php echo $calificacion['rama_id'];?></td>
			<td><?php echo $calificacion['expiracion'];?></td>
			<td><?php echo $calificacion['created'];?></td>
			<td><?php echo $calificacion['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'calificaciones', 'action' => 'view', $calificacion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'calificaciones', 'action' => 'edit', $calificacion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'calificaciones', 'action' => 'delete', $calificacion['id']), null, __('Are you sure you want to delete # %s?', $calificacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Calificacion'), array('controller' => 'calificaciones', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
