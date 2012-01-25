<div class="roles index">
	<h2><?php echo __('Roles');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('nombre');?></th>
							<th><?php echo $this->Paginator->sort('descripcion');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($roles as $rol): ?>
	<tr>
		<td><?php echo h($rol['Rol']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($rol['Rol']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($rol['Rol']['created']); ?>&nbsp;</td>
		<td><?php echo h($rol['Rol']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rol['Rol']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rol['Rol']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rol['Rol']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $rol['Rol']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Rol'), array('action' => 'add')); ?></li>
	</ul>
</div>
