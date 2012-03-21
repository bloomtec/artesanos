<div class="personas view">
<h2><?php  echo __('Persona');?></h2>
		<label><?php echo __('Per Nombres'); ?></label>
		<h3>
			<?php echo h($persona['Persona']['per_nombres']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Per Apellidos'); ?></label>
		<h3>
			<?php echo h($persona['Persona']['per_apellidos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Per Cedula De Identidad'); ?></label>
		<h3>
			<?php echo h($persona['Persona']['per_documento_de_identidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Per Departamento'); ?></label>
		<h3>
			<?php echo h($persona['Persona']['per_departamento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($persona['Persona']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Personas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Persona'), array('action' => 'edit', $persona['Persona']['id'])); ?> </li>
	</ul>
</div>