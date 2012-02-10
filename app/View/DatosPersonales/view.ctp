<div class="datosPersonales view">
<h2><?php  echo __('Datos Personal');?></h2>
		<label><?php echo __('Calificacion'); ?></label>
		<h3>
			<?php echo $this->Html->link($datosPersonal['Calificacion']['id'], array('controller' => 'calificaciones', 'action' => 'view', $datosPersonal['Calificacion']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Apellido Paterno'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_apellido_paterno']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Apellido Materno'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_apellido_materno']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Nombres'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_nombres']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Nacionalidad'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_nacionalidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Fecha Nacimiento'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_fecha_nacimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Estado Civil'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_estado_civil']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Grado Estudio'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_grado_estudio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Sexo'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_sexo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Hijos Mayores'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_hijos_mayores']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Hijos Menores'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_hijos_menores']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Tipo Discapacidad'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_tipo_discapacidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Dat Porcentaje De Discapacidad'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['dat_porcentaje_de_discapacidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($datosPersonal['DatosPersonal']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Datos Personales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Datos Personal'), array('action' => 'edit', $datosPersonal['DatosPersonal']['id'])); ?> </li>
	</ul>
</div>