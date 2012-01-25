<div class="ubicaciones view">
<h2><?php  echo __('Ubicacion');?></h2>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($ubicacion['Ubicacion']['nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Descripcion'); ?></label>
		<h3>
			<?php echo h($ubicacion['Ubicacion']['descripcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($ubicacion['Ubicacion']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Ubicaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Ubicacion'), array('action' => 'edit', $ubicacion['Ubicacion']['id'])); ?> </li>
	</ul>
</div>