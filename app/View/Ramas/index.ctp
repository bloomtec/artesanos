<div class="ramas index">
	<h2><?php echo __('Ramas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('grupos_de_rama_id', 'Grupo De Ramas');?></th>
		<th><?php echo $this->Paginator->sort('ram_nombre', 'Nombre');?></th>
		<th><?php echo $this->Paginator->sort('ram_descripcion', 'Descripción');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ramas as $rama): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($rama['GruposDeRama']['gru_nombre'], array('controller' => 'grupos_de_ramas', 'action' => 'view', $rama['GruposDeRama']['id'])); ?>
		</td>
		<td><?php echo h($rama['Rama']['ram_nombre']); ?>&nbsp;</td>
		<td><?php echo h($rama['Rama']['ram_descripcion']); ?>&nbsp;</td>
		<td class="actions">			
			<?php
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'view')))) {
					echo $this->Html->link(__('View'), array('action' => 'view', $rama['Rama']['id']),array('class'=>'view', 'title' => 'Ver'));
				}
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'edit')))) {
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $rama['Rama']['id']),array('class'=>'edit', 'title' => 'Modificar'));
				}
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'delete')))) {
					echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rama['Rama']['id']), array('class'=>'delete', 'title' => 'Eliminar'), __('Esta seguro que quiere eliminar el registro?', $rama['Rama']['id']));
				}
			?>
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
		<li><?php echo $this->Html->link(__('Agregar Rama'), array('action' => 'add')); ?></li>
	</ul>
</div>
