<div class="instructores index">
	<h2><?php echo __('Instructores');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>		
					<th><?php echo $this->Paginator->sort('ins_nacionalidad','Nacionalidad');?></th>			
					<th><?php echo $this->Paginator->sort('ins_documento_de_identificacion','Documento De Identificacion');?></th>				
					<th><?php echo $this->Paginator->sort('nombre_completo','Nombre Completo');?></th>							
					<th><?php echo $this->Paginator->sort('ins_especialidad','Especialidad');?></th>				
					<th><?php echo $this->Paginator->sort('ins_experiencia','Experiencia');?></th>					
				<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
	<?php
	$i = 0;
	foreach ($instructores as $instructor): ?>
	<tr>
		<td><?php echo h($instructor['Instructor']['ins_nacionalidad']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['ins_documento_de_identificacion']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['nombre_completo']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['ins_especialidad']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['ins_experiencia']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $instructor['Instructor']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $instructor['Instructor']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $instructor['Instructor']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $instructor['Instructor']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Instructor'), array('action' => 'add')); ?></li>
	</ul>
</div>
