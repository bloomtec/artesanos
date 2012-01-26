<div class="sectores view">
<h2><?php  echo __('Sector');?></h2>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($sector['Sector']['nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Descripcion'); ?></label>
		<h3>
			<?php echo h($sector['Sector']['descripcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($sector['Sector']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Sectores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Sector'), array('action' => 'edit', $sector['Sector']['id'])); ?> </li>
	</ul>
</div>