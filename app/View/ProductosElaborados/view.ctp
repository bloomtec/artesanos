<div class="productosElaborados view">
<h2><?php  echo __('Productos Elaborado');?></h2>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($productosElaborado['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $productosElaborado['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Cantidad'); ?></label>
		<h3>
			<?php echo h($productosElaborado['ProductosElaborado']['pro_cantidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Detalle'); ?></label>
		<h3>
			<?php echo h($productosElaborado['ProductosElaborado']['pro_detalle']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Procedencia'); ?></label>
		<h3>
			<?php echo h($productosElaborado['ProductosElaborado']['pro_procedencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Valor Comercial'); ?></label>
		<h3>
			<?php echo h($productosElaborado['ProductosElaborado']['pro_valor_comercial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($productosElaborado['ProductosElaborado']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Productos Elaborados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Productos Elaborado'), array('action' => 'edit', $productosElaborado['ProductosElaborado']['id'])); ?> </li>
	</ul>
</div>