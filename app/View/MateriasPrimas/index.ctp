<div class="materiasPrimas index">
	<h2><?php echo __('Materias Primas');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('taller_id');?></th>
							<th><?php echo $this->Paginator->sort('mat_cantidad');?></th>
							<th><?php echo $this->Paginator->sort('mat_tipo_de_materia_prima');?></th>
							<th><?php echo $this->Paginator->sort('mat_procedencia');?></th>
							<th><?php echo $this->Paginator->sort('mat_valor_comercial');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($materiasPrimas as $materiasPrima): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($materiasPrima['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $materiasPrima['Taller']['id'])); ?>
		</td>
		<td><?php echo h($materiasPrima['MateriasPrima']['mat_cantidad']); ?>&nbsp;</td>
		<td><?php echo h($materiasPrima['MateriasPrima']['mat_tipo_de_materia_prima']); ?>&nbsp;</td>
		<td><?php echo h($materiasPrima['MateriasPrima']['mat_procedencia']); ?>&nbsp;</td>
		<td><?php echo h($materiasPrima['MateriasPrima']['mat_valor_comercial']); ?>&nbsp;</td>
		<td><?php echo h($materiasPrima['MateriasPrima']['created']); ?>&nbsp;</td>
		<td><?php echo h($materiasPrima['MateriasPrima']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $materiasPrima['MateriasPrima']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $materiasPrima['MateriasPrima']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $materiasPrima['MateriasPrima']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $materiasPrima['MateriasPrima']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Materias Prima'), array('action' => 'add')); ?></li>
	</ul>
</div>
