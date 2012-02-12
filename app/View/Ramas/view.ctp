<div class="ramas view">
<h2><?php  echo __('Rama');?></h2>
		<label><?php echo __('Grupos De Rama'); ?></label>
		<h3>
			<?php echo $this->Html->link($rama['GruposDeRama']['id'], array('controller' => 'grupos_de_ramas', 'action' => 'view', $rama['GruposDeRama']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ram Nombre'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['ram_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ram Descripcion'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['ram_descripcion']); ?>
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