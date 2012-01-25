<div class="calificaciones index">
	<h2><?php echo __('Calificaciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('rama_id');?></th>
			<th><?php echo $this->Paginator->sort('expiracion');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($calificaciones as $calificacion): ?>
	<tr>
		<td><?php echo h($calificacion['Calificacion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($calificacion['Rama']['nombre'], array('controller' => 'ramas', 'action' => 'view', $calificacion['Rama']['id'])); ?>
		</td>
		<td><?php echo h($calificacion['Calificacion']['expiracion']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['created']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $calificacion['Calificacion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $calificacion['Calificacion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $calificacion['Calificacion']['id']), null, __('Are you sure you want to delete # %s?', $calificacion['Calificacion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Calificacion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ramas'), array('controller' => 'ramas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rama'), array('controller' => 'ramas', 'action' => 'add')); ?> </li>
	</ul>
</div>
