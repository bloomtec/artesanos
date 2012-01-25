<div class="balances index">
	<h2><?php echo __('Balances');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('domicilio_propio');?></th>
			<th><?php echo $this->Paginator->sort('domicilio_valor');?></th>
			<th><?php echo $this->Paginator->sort('taller_propio');?></th>
			<th><?php echo $this->Paginator->sort('taller_valor');?></th>
			<th><?php echo $this->Paginator->sort('servicios_basicos');?></th>
			<th><?php echo $this->Paginator->sort('salario_operarios');?></th>
			<th><?php echo $this->Paginator->sort('salario_aprendices');?></th>
			<th><?php echo $this->Paginator->sort('total_egresos');?></th>
			<th><?php echo $this->Paginator->sort('maquinaria_y_herramientas');?></th>
			<th><?php echo $this->Paginator->sort('materia_prima');?></th>
			<th><?php echo $this->Paginator->sort('elaborados');?></th>
			<th><?php echo $this->Paginator->sort('otros_ingresos');?></th>
			<th><?php echo $this->Paginator->sort('total_ingresos');?></th>
			<th><?php echo $this->Paginator->sort('rentabilidad_mensual');?></th>
			<th><?php echo $this->Paginator->sort('taller_id');?></th>
			<th><?php echo $this->Paginator->sort('local_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($balances as $balance): ?>
	<tr>
		<td><?php echo h($balance['Balance']['id']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['domicilio_propio']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['domicilio_valor']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['taller_propio']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['taller_valor']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['servicios_basicos']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['salario_operarios']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['salario_aprendices']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['total_egresos']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['maquinaria_y_herramientas']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['materia_prima']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['elaborados']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['otros_ingresos']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['total_ingresos']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['rentabilidad_mensual']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($balance['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $balance['Taller']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($balance['Local']['id'], array('controller' => 'locales', 'action' => 'view', $balance['Local']['id'])); ?>
		</td>
		<td><?php echo h($balance['Balance']['created']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $balance['Balance']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $balance['Balance']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $balance['Balance']['id']), null, __('Are you sure you want to delete # %s?', $balance['Balance']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Balance'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
