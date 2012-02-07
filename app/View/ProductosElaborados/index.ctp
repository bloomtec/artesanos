<div class="productosElaborados index">
	<h2><?php echo __('Productos Elaborados');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('taller_id');?></th>
							<th><?php echo $this->Paginator->sort('pro_cantidad');?></th>
							<th><?php echo $this->Paginator->sort('pro_detalle');?></th>
							<th><?php echo $this->Paginator->sort('pro_procedencia');?></th>
							<th><?php echo $this->Paginator->sort('pro_valor_comercial');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productosElaborados as $productosElaborado): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($productosElaborado['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $productosElaborado['Taller']['id'])); ?>
		</td>
		<td><?php echo h($productosElaborado['ProductosElaborado']['pro_cantidad']); ?>&nbsp;</td>
		<td><?php echo h($productosElaborado['ProductosElaborado']['pro_detalle']); ?>&nbsp;</td>
		<td><?php echo h($productosElaborado['ProductosElaborado']['pro_procedencia']); ?>&nbsp;</td>
		<td><?php echo h($productosElaborado['ProductosElaborado']['pro_valor_comercial']); ?>&nbsp;</td>
		<td><?php echo h($productosElaborado['ProductosElaborado']['created']); ?>&nbsp;</td>
		<td><?php echo h($productosElaborado['ProductosElaborado']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $productosElaborado['ProductosElaborado']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $productosElaborado['ProductosElaborado']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $productosElaborado['ProductosElaborado']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $productosElaborado['ProductosElaborado']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Productos Elaborado'), array('action' => 'add')); ?></li>
	</ul>
</div>
