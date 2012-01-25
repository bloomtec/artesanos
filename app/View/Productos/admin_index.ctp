<div class="productos index">
	<h2><?php echo __('Productos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('detalle');?></th>
			<th><?php echo $this->Paginator->sort('procedencia');?></th>
			<th><?php echo $this->Paginator->sort('valor_comercial');?></th>
			<th><?php echo $this->Paginator->sort('taller_id');?></th>
			<th><?php echo $this->Paginator->sort('local_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($productos as $producto): ?>
	<tr>
		<td><?php echo h($producto['Producto']['id']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['detalle']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['procedencia']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['valor_comercial']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($producto['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $producto['Taller']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($producto['Local']['id'], array('controller' => 'locales', 'action' => 'view', $producto['Local']['id'])); ?>
		</td>
		<td><?php echo h($producto['Producto']['created']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $producto['Producto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $producto['Producto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $producto['Producto']['id']), null, __('Are you sure you want to delete # %s?', $producto['Producto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Producto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
