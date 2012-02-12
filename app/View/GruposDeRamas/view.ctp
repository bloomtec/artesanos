<div class="gruposDeRamas view">
<h2><?php  echo __('Grupos De Rama');?></h2>
		<label><?php echo __('Gru Nombre'); ?></label>
		<h3>
			<?php echo h($gruposDeRama['GruposDeRama']['gru_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Gru Descipcion'); ?></label>
		<h3>
			<?php echo h($gruposDeRama['GruposDeRama']['gru_descipcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($gruposDeRama['GruposDeRama']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Grupos De Ramas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Grupos De Rama'), array('action' => 'edit', $gruposDeRama['GruposDeRama']['id'])); ?> </li>
	</ul>
</div>