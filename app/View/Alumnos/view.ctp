<div class="alumnos view">
<h2><?php  echo __('Alumno');?></h2>
		<label><?php echo __('Nacionalidad'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_nacionalidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Es Cedula'); ?></label>
		<h3>
			<?php
				if($alumno['Alumno']['alu_is_cedula']) {
					echo '<input type="checkbox" checked="checked" disabled="disabled" />';
				} else {
					echo '<input type="checkbox" disabled="disabled" />';
				}
			?>
			&nbsp;
		</h3>
		<label><?php echo __('Documento De Identificacion'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_documento_de_identificacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apellido Paterno'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_apellido_paterno']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apellido Materno'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_apellido_materno']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombres'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_nombres']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha De Nacimiento'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_fecha_de_nacimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tipo De Sangre'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_tipo_de_sangre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Estado Civil'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_estado_civil']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Grado De Estudio'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_grado_de_estudio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sexo'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['alu_sexo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Created'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($alumno['Alumno']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Alumnos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Alumno'), array('action' => 'edit', $alumno['Alumno']['id'])); ?> </li>
	</ul>
</div>