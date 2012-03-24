<div class="cursos index">
	<h2><?php echo __('Cursos');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('solicitud_id','Solicitud');?></th>
		<th><?php echo $this->Paginator->sort('instructor_id','Instructor');?></th>
		<th><?php echo $this->Paginator->sort('cur_nombre','Nombre');?></th>
		<th><?php echo $this->Paginator->sort('cur_descripcion','Descripción');?></th>
		<th><?php echo $this->Paginator->sort('cur_fecha_de_inicio','Fecha De Inicio');?></th>
		<th><?php echo $this->Paginator->sort('cur_fecha_de_fin','Fecha De Fin');?></th>
		<th><?php echo $this->Paginator->sort('cur_costo','Costo');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php $i = 0; foreach ($cursos as $curso): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($curso['Solicitud']['id'], array('controller' => 'solicitudes', 'action' => 'view', $curso['Solicitud']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($curso['Instructor']['id'], array('controller' => 'instructores', 'action' => 'view', $curso['Instructor']['id'])); ?>
		</td>
		<td><?php echo h($curso['Curso']['cur_nombre']); ?>&nbsp;</td>
		<td><?php echo h($curso['Curso']['cur_descripcion']); ?>&nbsp;</td>
		<td><?php echo h($curso['Curso']['cur_fecha_de_inicio']); ?>&nbsp;</td>
		<td><?php echo h($curso['Curso']['cur_fecha_de_fin']); ?>&nbsp;</td>
		<td><?php echo h($curso['Curso']['cur_costo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $curso['Curso']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $curso['Curso']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php echo $this->Html->link(__('Ver Alumnos'), array('action' => 'verAlumnos', $curso['Curso']['id']),array('class'=>'verAlumnos','title'=>'Ver alumnos')); ?>
			<?php echo $this->Html->link(__('Ingresar notas'), array('action' => 'ingresarCalificaciones', $curso['Curso']['id']),array('class'=>'calificaciones','title'=>'Ingresar Calificaciones')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $curso['Curso']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $curso['Curso']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Curso'), array('action' => 'add')); ?></li>
	</ul>
</div>
