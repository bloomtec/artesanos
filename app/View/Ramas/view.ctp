<div class="ramas view">
<h2><?php  echo __('Rama');?></h2>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Descripcion'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['descripcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Ramas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Rama'), array('action' => 'edit', $rama['Rama']['id'])); ?> </li>
	</ul>
</div>