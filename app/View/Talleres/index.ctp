<div class="talleres index">
	<h2><?php echo __('Talleres');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('razon_social_o_nombre_comercial');?></th>
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
	foreach ($talleres as $taller): ?>
	<tr>
		<td><?php echo h($taller['Taller']['id']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['razon_social_o_nombre_comercial']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['pichincha']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['canton']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['parroquia']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['calle_o_avenida']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['numero']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['interseccion']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['barrio']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['telefono_celular']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['telefono_convencional']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['referencia']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($taller['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $taller['Artesano']['id'])); ?>
		</td>
		<td><?php echo h($taller['Taller']['created']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $taller['Taller']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $taller['Taller']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $taller['Taller']['id']), null, __('Are you sure you want to delete # %s?', $taller['Taller']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Taller'), array('action' => 'add')); ?></li>
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
