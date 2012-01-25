<div class="inspecciones index">
	<h2><?php echo __('Inspecciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('usuario_id');?></th>
			<th><?php echo $this->Paginator->sort('artesano_id');?></th>
			<th><?php echo $this->Paginator->sort('taller_id');?></th>
			<th><?php echo $this->Paginator->sort('local_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($inspecciones as $inspeccion): ?>
	<tr>
		<td><?php echo h($inspeccion['Inspeccion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($inspeccion['Usuario']['usuario'], array('controller' => 'usuarios', 'action' => 'view', $inspeccion['Usuario']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inspeccion['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $inspeccion['Artesano']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inspeccion['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $inspeccion['Taller']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inspeccion['Local']['id'], array('controller' => 'locales', 'action' => 'view', $inspeccion['Local']['id'])); ?>
		</td>
		<td><?php echo h($inspeccion['Inspeccion']['created']); ?>&nbsp;</td>
		<td><?php echo h($inspeccion['Inspeccion']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $inspeccion['Inspeccion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $inspeccion['Inspeccion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $inspeccion['Inspeccion']['id']), null, __('Are you sure you want to delete # %s?', $inspeccion['Inspeccion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artesanos'), array('controller' => 'artesanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artesano'), array('controller' => 'artesanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
