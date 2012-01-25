<div class="aprendices index">
	<h2><?php echo __('Aprendices');?></h2>
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
	foreach ($aprendices as $aprendiz): ?>
	<tr>
		<td><?php echo h($aprendiz['Aprendiz']['id']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['operario']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['cedula']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['fecha_de_ingreso']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['afiliado_seguro']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['edad']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['pago_mensual']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aprendiz['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $aprendiz['Taller']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aprendiz['Local']['id'], array('controller' => 'locales', 'action' => 'view', $aprendiz['Local']['id'])); ?>
		</td>
		<td><?php echo h($aprendiz['Aprendiz']['created']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aprendiz['Aprendiz']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aprendiz['Aprendiz']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aprendiz['Aprendiz']['id']), null, __('Are you sure you want to delete # %s?', $aprendiz['Aprendiz']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Aprendiz'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
