<div class="instructores view">
<h2><?php  echo __('Instructor');?></h2>
		<label><?php echo __('Ins Nacionalidad'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_nacionalidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Is Cedula'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_is_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Documento De Identificacion'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_documento_de_identificacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Apellido Paterno'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_apellido_paterno']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Apellido Materno'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_apellido_materno']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Nombres'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_nombres']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Fecha De Nacimiento'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_fecha_de_nacimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Tipo De Sangre'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_tipo_de_sangre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Estado Civil'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_estado_civil']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Especialidad'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_especialidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ins Experiencia'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['ins_experiencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($instructor['Instructor']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Instructores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Instructor'), array('action' => 'edit', $instructor['Instructor']['id'])); ?> </li>
	</ul>
</div>