<div class="ventasEspecies index">
	<h2><?php echo __('Ventas Especies');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('artesano_id','Artesano');?></th>
		<th><?php echo $this->Paginator->sort('ven_cantidad','Cantidad');?></th>
		<th><?php echo $this->Paginator->sort('ven_valor','Valor');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ventasEspecies as $ventasEspecie): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($ventasEspecie['Artesano']['nombre_completo'], array('controller' => 'artesanos', 'action' => 'view', $ventasEspecie['Artesano']['id'])); ?>
		</td>
		<td><?php echo h($ventasEspecie['VentasEspecie']['ven_cantidad']); ?>&nbsp;</td>
		<td><?php echo h($ventasEspecie['VentasEspecie']['ven_valor']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ventasEspecie['VentasEspecie']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php echo $this -> Html -> link(__('Factura'), array('action' => 'factura', $ventasEspecie['VentasEspecie']['factura_id']), array('class' => 'factura', 'title' => 'Factura'));?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $ventasEspecie['VentasEspecie']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ventasEspecie['VentasEspecie']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $ventasEspecie['VentasEspecie']['id'])); ?>
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
