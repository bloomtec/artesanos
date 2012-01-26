<div class="ciudades view">
<h2><?php  echo __('Ciudad');?></h2>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($ciudad['Ciudad']['nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Descripcion'); ?></label>
		<h3>
			<?php echo h($ciudad['Ciudad']['descripcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($ciudad['Ciudad']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Ciudades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Ciudad'), array('action' => 'edit', $ciudad['Ciudad']['id'])); ?> </li>
	</ul>
</div>