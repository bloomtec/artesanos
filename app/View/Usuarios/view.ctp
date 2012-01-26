<div class="usuarios view">
<h2><?php  echo __('Usuario');?></h2>
		<label><?php echo __('Usuario'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usuario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Contrasena'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['contrasena']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo $this->Html->link($usuario['Ciudad']['nombre'], array('controller' => 'ciudades', 'action' => 'view', $usuario['Ciudad']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ubicacion'); ?></label>
		<h3>
			<?php echo $this->Html->link($usuario['Ubicacion']['nombre'], array('controller' => 'ubicaciones', 'action' => 'view', $usuario['Ubicacion']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sector'); ?></label>
		<h3>
			<?php echo $this->Html->link($usuario['Sector']['nombre'], array('controller' => 'sectores', 'action' => 'view', $usuario['Sector']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Rol'); ?></label>
		<h3>
			<?php echo $this->Html->link($usuario['Rol']['nombre'], array('controller' => 'roles', 'action' => 'view', $usuario['Rol']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Acceso'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['con_acceso']); ?>
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