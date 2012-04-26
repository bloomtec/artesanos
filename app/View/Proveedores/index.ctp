<div class="proveedores index">
	<h2><?php echo __('Proveedores');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('pro_rut', 'Ruc');?></th>
		<th><?php echo $this->Paginator->sort('pro_nombre_razon_social', 'Nombre Razon Social');?></th>
		<th><?php echo $this->Paginator->sort('pro_representante_legal', 'Representante Legal');?></th>
		<th><?php echo $this->Paginator->sort('pro_telefono_fijo', 'Teléfono Fijo');?></th>
		<th><?php echo $this->Paginator->sort('pro_celular', 'Celular');?></th>
		<th><?php echo $this->Paginator->sort('pro_observaciones', 'Observaciones');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($proveedores as $proveedor): ?>
	<tr>
		<td><?php echo h($proveedor['Proveedor']['pro_rut']); ?>&nbsp;</td>
		<td><?php echo h($proveedor['Proveedor']['pro_nombre_razon_social']); ?>&nbsp;</td>
		<td><?php echo h($proveedor['Proveedor']['pro_representante_legal']); ?>&nbsp;</td>
		<td><?php echo h($proveedor['Proveedor']['pro_telefono_fijo']); ?>&nbsp;</td>
		<td><?php echo h($proveedor['Proveedor']['pro_celular']); ?>&nbsp;</td>
		<td><?php echo h($proveedor['Proveedor']['pro_observaciones']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $proveedor['Proveedor']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $proveedor['Proveedor']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $proveedor['Proveedor']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $proveedor['Proveedor']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Proveedor'), array('action' => 'add')); ?></li>
	</ul>
</div>
