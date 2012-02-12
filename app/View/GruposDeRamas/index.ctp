<div class="gruposDeRamas index">
	<h2><?php echo __('Grupos De Ramas');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('gru_nombre');?></th>
							<th><?php echo $this->Paginator->sort('gru_descipcion');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($gruposDeRamas as $gruposDeRama): ?>
	<tr>
		<td><?php echo h($gruposDeRama['GruposDeRama']['gru_nombre']); ?>&nbsp;</td>
		<td><?php echo h($gruposDeRama['GruposDeRama']['gru_descipcion']); ?>&nbsp;</td>
		<td><?php echo h($gruposDeRama['GruposDeRama']['created']); ?>&nbsp;</td>
		<td><?php echo h($gruposDeRama['GruposDeRama']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gruposDeRama['GruposDeRama']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gruposDeRama['GruposDeRama']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gruposDeRama['GruposDeRama']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $gruposDeRama['GruposDeRama']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Grupos De Rama'), array('action' => 'add')); ?></li>
	</ul>
</div>
