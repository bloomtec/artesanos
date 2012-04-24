<div class="cursos index">
	<h2><?php echo __('Cursos');?></h2>
	<div class="search">
		<?php if($pdf=="") { ?> 
		<label>BUSCAR:</label>
		<input type="text" />
		<?php } ?>
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<?php if($pdf!="") { ?> 
		<th>Solicitud</th>
		<th>Instructor</th>
		<th>Nombre</th>
		<th>Descripción</th>
		<th>Fecha De Inicio</th>
		<th>Fecha De Fin</th>
		<th>Costo</th>
		<th>Estado</th>
		<?php }else { ?>
		<th><?php echo $this->Paginator->sort('solicitud_id','Solicitud');?></th>
		<th><?php echo $this->Paginator->sort('instructor_id','Instructor');?></th>
		<th><?php echo $this->Paginator->sort('cur_nombre','Nombre');?></th>
		<th><?php echo $this->Paginator->sort('cur_fecha_de_inicio','Fecha De Inicio');?></th>
		<th><?php echo $this->Paginator->sort('cur_fecha_de_fin','Fecha De Fin');?></th>
		<th><?php echo $this->Paginator->sort('cur_costo','Costo');?></th>
		<th><?php echo $this->Paginator->sort('cur_activo','Estado');?></th>
		<?php } if($pdf=="") { ?>
		<th class="actions"><?php echo __('Acciones');?></th>
		<?php } ?> 
	</tr>
	<?php $i = 0; foreach ($cursos as $curso): ?>
	<tr>
		<td>
			<?php if($pdf=="") { 
			 echo $this->Html->link($curso['Solicitud']['id'], array('controller' => 'solicitudes', 'action' => 'view', $curso['Solicitud']['id']));
			} else { echo $curso['Solicitud']['id']; } ?>
		</td>
		<td>
			<?php if($pdf=="") {
	
					if($curso['Curso']['instructor_id']){
						echo "Instructor: ".$this->Html->link($curso['Instructor']['ins_nombres'], array('controller' => 'instructores', 'action' => 'view', $curso['Instructor']['id']));
					} elseif($curso['Curso']['profesor_id']){
						echo "Profesor: ".$this->Html->link($curso['Profesor']['pro_nombres'], array('controller' => 'instructores', 'action' => 'view', $curso['Profesor']['id']));
					}
				} else {
					if(!empty($curso['Instructor'])){
						echo "Instructor: ".$curso['Instructor']['ins_nombres']; 
					} elseif(!empty($curso['Profesor'])){
						echo "Profesor: ".$curso['Profesor']['pro_nombres'];
					}
				} 
			?>
		</td>
		<td><?php echo h($curso['Curso']['cur_nombre']); ?>&nbsp;</td>
		<td><?php echo h($curso['Curso']['cur_fecha_de_inicio']); ?>&nbsp;</td>
		<td><?php echo h($curso['Curso']['cur_fecha_de_fin']); ?>&nbsp;</td>
		<td><?php echo h($curso['Curso']['cur_costo']); ?>&nbsp;</td>
		<td><?php $echo = $curso['Curso']['cur_activo']? 'Activo': 'Cerrado'; echo $echo; ?>&nbsp;</td>
		<?php if($pdf=="") { ?> 
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $curso['Curso']['id']), array('class'=>'view','title'=>'Ver')); ?>
			<?php if($curso['Curso']['cur_activo']) echo $this->Html->link(__('Edit'), array('action' => 'edit', $curso['Curso']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php echo $this->Html->link(__('Ver Alumnos'), array('action' => 'verAlumnos', $curso['Curso']['id']),array('class'=>'verAlumnos','title'=>'Ver alumnos')); ?>
			<?php if($curso['Curso']['cur_activo']) echo $this->Html->link(__('Ingresar notas'), array('action' => 'ingresarCalificaciones', $curso['Curso']['id']),array('class'=>'calificaciones','title'=>'Ingresar Calificaciones')); ?>
			<?php if($curso['Curso']['cur_activo']) echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $curso['Curso']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $curso['Curso']['id'])); ?>
		</td>
		<?php } ?> 
	</tr>
	<?php endforeach; ?>
	</table>

<?php if($pdf=="") { ?> 
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
		<!--<li><?php echo $this->Html->link(__('Agregar Curso'), array('action' => 'add')); ?></li> -->
		<li><?php echo $this->Html->link(__('Descargar pdf'), array('action' => 'index','pdf'),array('class'=>'','title'=>'Descargar pdf')); ?></li>
	</ul>
</div>
<?php } ?> 
