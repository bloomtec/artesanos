<div class="artesanos index">
	<h2><?php echo __('Artesanos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('apellido_paterno');?></th>
			<th><?php echo $this->Paginator->sort('apellido_materno');?></th>
			<th><?php echo $this->Paginator->sort('nombres');?></th>
			<th><?php echo $this->Paginator->sort('nacionalidad');?></th>
			<th><?php echo $this->Paginator->sort('cedula_de_ciudadania');?></th>
			<th><?php echo $this->Paginator->sort('fecha_de_nacimiento');?></th>
			<th><?php echo $this->Paginator->sort('tipo_de_sangre');?></th>
			<th><?php echo $this->Paginator->sort('estado_civil');?></th>
			<th><?php echo $this->Paginator->sort('edad');?></th>
			<th><?php echo $this->Paginator->sort('grado_de_estudio');?></th>
			<th><?php echo $this->Paginator->sort('sexo');?></th>
			<th><?php echo $this->Paginator->sort('hijos_mayores');?></th>
			<th><?php echo $this->Paginator->sort('hijos_menores');?></th>
			<th><?php echo $this->Paginator->sort('tipo_de_discapacidad');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($artesanos as $artesano): ?>
	<tr>
		<td><?php echo h($artesano['Artesano']['id']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['apellido_paterno']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['apellido_materno']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['nombres']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['nacionalidad']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['cedula_de_ciudadania']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['fecha_de_nacimiento']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['tipo_de_sangre']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['estado_civil']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['edad']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['grado_de_estudio']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['sexo']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['hijos_mayores']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['hijos_menores']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['tipo_de_discapacidad']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['created']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $artesano['Artesano']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $artesano['Artesano']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $artesano['Artesano']['id']), null, __('Are you sure you want to delete # %s?', $artesano['Artesano']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Artesano'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inspecciones'), array('controller' => 'inspecciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
