<div class="cantones view">
<h2><?php  echo __('Canton');?></h2>
		<label><?php echo __('Provincia'); ?></label>
		<h3>
			<?php echo $this->Html->link($canton['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $canton['Provincia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Can Nombre'); ?></label>
		<h3>
			<?php echo h($canton['Canton']['can_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($canton['Canton']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Cantones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Canton'), array('action' => 'edit', $canton['Canton']['id'])); ?> </li>
	</ul>
</div>