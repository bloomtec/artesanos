<div class="titulos index">
	<h2><?php echo __('Titulos');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('rama_id',' Id');?></th>
							<th><?php echo $this->Paginator->sort('tit_nombre','Nombre');?></th>
							<th><?php echo $this->Paginator->sort('tit_descripcion','Descripcion');?></th>
					<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($titulos as $titulo): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($titulo['Rama']['ram_nombre'], array('controller' => 'ramas', 'action' => 'view', $titulo['Rama']['id'])); ?>
		</td>
		<td><?php echo h($titulo['Titulo']['tit_nombre']); ?>&nbsp;</td>
		<td><?php echo h($titulo['Titulo']['tit_descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $titulo['Titulo']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $titulo['Titulo']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $titulo['Titulo']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $titulo['Titulo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Titulo'), array('action' => 'add')); ?></li>
	</ul>
</div>
