<div class="cursos view">
<h2><?php  echo __('Curso');?></h2>
		<label><?php echo __('Solicitud'); ?></label>
		<h3>
			<?php echo $this->Html->link($curso['Solicitud']['id'], array('controller' => 'solicitudes', 'action' => 'view', $curso['Solicitud']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Instructor'); ?></label>
		<h3>
			<?php echo $this->Html->link($curso['Instructor']['id'], array('controller' => 'instructores', 'action' => 'view', $curso['Instructor']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($curso['Curso']['cur_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Descripcion'); ?></label>
		<h3>
			<?php echo h($curso['Curso']['cur_descripcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha De Inicio'); ?></label>
		<h3>
			<?php echo h($curso['Curso']['cur_fecha_de_inicio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha De Fin'); ?></label>
		<h3>
			<?php echo h($curso['Curso']['cur_fecha_de_fin']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Costo'); ?></label>
		<h3>
			<?php echo h($curso['Curso']['cur_costo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($curso['Curso']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Cursos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Curso'), array('action' => 'edit', $curso['Curso']['id'])); ?> </li>
	</ul>
</div>