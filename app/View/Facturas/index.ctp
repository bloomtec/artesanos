<div class="facturas index">
	<h2><?php echo __('Facturas');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('fac_numero','Numero');?></th>
		<th><?php echo $this->Paginator->sort('fac_comprobante_deposito','Comprobante Deposito');?></th>
		<th><?php echo $this->Paginator->sort('fac_cliente','Cliente');?></th>
		<th><?php echo $this->Paginator->sort('provincia_id','Incia Id');?></th>
		<th><?php echo $this->Paginator->sort('canton_id','On Id');?></th>
		<th><?php echo $this->Paginator->sort('ciudad_id','Ad Id');?></th>
		<th><?php echo $this->Paginator->sort('fac_direccion','Direccion');?></th>
		<th><?php echo $this->Paginator->sort('fac_telefono','Telefono');?></th>
		<th><?php echo $this->Paginator->sort('fac_ruc_doc','Ruc Doc');?></th>
		<th><?php echo $this->Paginator->sort('fac_fecha_emision','Fecha Emision');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($facturas as $factura): ?>
	<tr>
		<td><?php echo h($factura['Factura']['fac_numero']); ?>&nbsp;</td>
		<td><?php echo h($factura['Factura']['fac_comprobante_deposito']); ?>&nbsp;</td>
		<td><?php echo h($factura['Factura']['fac_cliente']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($factura['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $factura['Provincia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($factura['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $factura['Canton']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($factura['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $factura['Ciudad']['id'])); ?>
		</td>
		<td><?php echo h($factura['Factura']['fac_direccion']); ?>&nbsp;</td>
		<td><?php echo h($factura['Factura']['fac_telefono']); ?>&nbsp;</td>
		<td><?php echo h($factura['Factura']['fac_ruc_doc']); ?>&nbsp;</td>
		<td><?php echo h($factura['Factura']['fac_fecha_emision']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $factura['Factura']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $factura['Factura']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $factura['Factura']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $factura['Factura']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Factura'), array('action' => 'add')); ?></li>
	</ul>
</div>
