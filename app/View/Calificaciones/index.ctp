<div class="calificaciones index">
	<h2><?php echo __('Calificaciones');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('rama_id');?></th>
							<th><?php echo $this->Paginator->sort('expiracion');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($calificaciones as $calificacion): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($calificacion['Rama']['nombre'], array('controller' => 'ramas', 'action' => 'view', $calificacion['Rama']['id'])); ?>
		</td>
		<td><?php echo h($calificacion['Calificacion']['expiracion']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['created']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $calificacion['Calificacion']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $calificacion['Calificacion']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $calificacion['Calificacion']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $calificacion['Calificacion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Calificacion'), array('action' => 'add')); ?></li>
	</ul>
</div>
