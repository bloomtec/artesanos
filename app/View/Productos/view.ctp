<div class="productos view">
<h2><?php  echo __('Producto');?></h2>
		<label><?php echo __('Pro Name'); ?></label>
		<h3>
			<?php echo h($producto['Producto']['pro_name']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Observaciones'); ?></label>
		<h3>
			<?php echo h($producto['Producto']['pro_observaciones']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($producto['Producto']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Productos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Producto'), array('action' => 'edit', $producto['Producto']['id'])); ?> </li>
	</ul>
</div>