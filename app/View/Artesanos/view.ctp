<div class="artesanos view">
<h2><?php  echo __('Artesano');?></h2>
		<label><?php echo __('Apellido Paterno'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['apellido_paterno']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apellido Materno'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['apellido_materno']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombres'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['nombres']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nacionalidad'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['nacionalidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cedula De Ciudadania'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['cedula_de_ciudadania']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha De Nacimiento'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['fecha_de_nacimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tipo De Sangre'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['tipo_de_sangre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Estado Civil'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['estado_civil']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Edad'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['edad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Grado De Estudio'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['grado_de_estudio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sexo'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['sexo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Hijos Mayores'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['hijos_mayores']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Hijos Menores'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['hijos_menores']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tipo De Discapacidad'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['tipo_de_discapacidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Artesanos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Artesano'), array('action' => 'edit', $artesano['Artesano']['id'])); ?> </li>
	</ul>
</div>