<div class="usuarios view">
<h2><?php  echo __('Usuario');?></h2>
		<label><?php echo __('Rol'); ?></label>
		<h3>
			<?php echo $this->Html->link($usuario['Rol']['rol_nombre'], array('controller' => 'roles', 'action' => 'view', $usuario['Rol']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Usu Nombre De Usuario'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usu_nombre_de_usuario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Usu Contrasena'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usu_contrasena']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Usu Cedula'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usu_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Usu Nombres Y Apellidos'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usu_nombres_y_apellidos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Usu Activo'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usu_activo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
	</ul>
</div>