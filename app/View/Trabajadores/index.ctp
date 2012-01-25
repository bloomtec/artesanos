<div class="trabajadores index">
	<h2><?php echo __('Trabajadores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('operario');?></th>
			<th><?php echo $this->Paginator->sort('cedula');?></th>
			<th><?php echo $this->Paginator->sort('fecha_de_ingreso');?></th>
			<th><?php echo $this->Paginator->sort('afiliado_seguro');?></th>
			<th><?php echo $this->Paginator->sort('edad');?></th>
			<th><?php echo $this->Paginator->sort('pago_mensual');?></th>
			<th><?php echo $this->Paginator->sort('taller_id');?></th>
			<th><?php echo $this->Paginator->sort('local_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($trabajadores as $trabajador): ?>
	<tr>
		<td><?php echo h($trabajador['Trabajador']['id']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['operario']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['cedula']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['fecha_de_ingreso']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['afiliado_seguro']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['edad']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['pago_mensual']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trabajador['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $trabajador['Taller']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($trabajador['Local']['id'], array('controller' => 'locales', 'action' => 'view', $trabajador['Local']['id'])); ?>
		</td>
		<td><?php echo h($trabajador['Trabajador']['created']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trabajador['Trabajador']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trabajador['Trabajador']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trabajador['Trabajador']['id']), null, __('Are you sure you want to delete # %s?', $trabajador['Trabajador']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Trabajador'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
