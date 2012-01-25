<div class="productos view">
<h2><?php  echo __('Producto');?></h2>
		<label><?php echo __('Cantidad'); ?></label>
		<h3>
			<?php echo h($producto['Producto']['cantidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Detalle'); ?></label>
		<h3>
			<?php echo h($producto['Producto']['detalle']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Procedencia'); ?></label>
		<h3>
			<?php echo h($producto['Producto']['procedencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Valor Comercial'); ?></label>
		<h3>
			<?php echo h($producto['Producto']['valor_comercial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($producto['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $producto['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Local'); ?></label>
		<h3>
			<?php echo $this->Html->link($producto['Local']['id'], array('controller' => 'locales', 'action' => 'view', $producto['Local']['id'])); ?>
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