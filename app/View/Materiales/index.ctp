<div class="materiales index">
	<h2><?php echo __('Materiales');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('cantidad');?></th>
							<th><?php echo $this->Paginator->sort('tipo_de_materia_prima');?></th>
							<th><?php echo $this->Paginator->sort('procedencia');?></th>
							<th><?php echo $this->Paginator->sort('valor_comercial');?></th>
							<th><?php echo $this->Paginator->sort('local_id');?></th>
							<th><?php echo $this->Paginator->sort('taller_id');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($materiales as $material): ?>
	<tr>
		<td><?php echo h($material['Material']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['tipo_de_materia_prima']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['procedencia']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['valor_comercial']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($material['Local']['id'], array('controller' => 'locales', 'action' => 'view', $material['Local']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($material['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $material['Taller']['id'])); ?>
		</td>
		<td><?php echo h($material['Material']['created']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $material['Material']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $material['Material']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $material['Material']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $material['Material']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Material'), array('action' => 'add')); ?></li>
	</ul>
</div>
