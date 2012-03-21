<div class="items index">
	<h2><?php echo __('Activos Fijos');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('ite_codigo', 'Código');?></th>
		<th><?php echo $this->Paginator->sort('ite_nombre', 'Nombre');?></th>
		<!--<th><?php echo $this->Paginator->sort('ite_tipo_de_item', 'Tipo De Item');?></th>-->
		<th><?php echo $this->Paginator->sort('ite_descripcion', 'Descripción');?></th>
		<th><?php echo $this->Paginator->sort('ite_observaciones', 'Observaciones');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($items as $item): ?>
	<tr>
		<td><?php echo h($item['Item']['ite_codigo']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['ite_nombre']); ?>&nbsp;</td>
		<!--<td><?php echo h($item['Item']['ite_tipo_de_item']); ?>&nbsp;</td>-->
		<td><?php echo h($item['Item']['ite_descripcion']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['ite_observaciones']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $item['Item']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $item['Item']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>


	<div class="paging">
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
	));
	?>	</p>-->
	<?php
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Activo Fijo'), array('action' => 'agregarActivoFijo')); ?></li>
	</ul>
</div>
