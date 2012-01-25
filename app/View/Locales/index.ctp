<div class="locales index">
	<h2><?php echo __('Locales');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('pichincha');?></th>
			<th><?php echo $this->Paginator->sort('canton');?></th>
			<th><?php echo $this->Paginator->sort('ciudad');?></th>
			<th><?php echo $this->Paginator->sort('parroquia');?></th>
			<th><?php echo $this->Paginator->sort('calle_o_avenida');?></th>
			<th><?php echo $this->Paginator->sort('numero');?></th>
			<th><?php echo $this->Paginator->sort('interseccion');?></th>
			<th><?php echo $this->Paginator->sort('barrio');?></th>
			<th><?php echo $this->Paginator->sort('telefono_celular');?></th>
			<th><?php echo $this->Paginator->sort('telefono_convencional');?></th>
			<th><?php echo $this->Paginator->sort('referencia');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('artesano_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($locales as $local): ?>
	<tr>
		<td><?php echo h($local['Local']['id']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['pichincha']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['canton']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['parroquia']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['calle_o_avenida']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['numero']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['interseccion']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['barrio']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['telefono_celular']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['telefono_convencional']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['referencia']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($local['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $local['Artesano']['id'])); ?>
		</td>
		<td><?php echo h($local['Local']['created']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $local['Local']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $local['Local']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $local['Local']['id']), null, __('Are you sure you want to delete # %s?', $local['Local']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Local'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Artesanos'), array('controller' => 'artesanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artesano'), array('controller' => 'artesanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aprendices'), array('controller' => 'aprendices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aprendiz'), array('controller' => 'aprendices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Balances'), array('controller' => 'balances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Balance'), array('controller' => 'balances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Equipos'), array('controller' => 'equipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipo'), array('controller' => 'equipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inspecciones'), array('controller' => 'inspecciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('controller' => 'materiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materiales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajadores'), array('controller' => 'trabajadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajador'), array('controller' => 'trabajadores', 'action' => 'add')); ?> </li>
	</ul>
</div>
