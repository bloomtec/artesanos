<div class="roles view">
<h2><?php  echo __('Rol');?></h2>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($rol['Rol']['nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Descripcion'); ?></label>
		<h3>
			<?php echo h($rol['Rol']['descripcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($rol['Rol']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Rol'), array('action' => 'edit', $rol['Rol']['id'])); ?> </li>
	</ul>
</div>