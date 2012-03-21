<div class="items view">
<h2><?php  echo __('Item');?></h2>
		<label><?php echo __('Codigo'); ?></label>
		<h3>
			<?php echo h($item['Item']['ite_codigo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($item['Item']['ite_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Descripcion'); ?></label>
		<h3>
			<?php echo h($item['Item']['ite_descripcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Observaciones'); ?></label>
		<h3>
			<?php echo h($item['Item']['ite_observaciones']); ?>
			&nbsp;
		</h3>	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
	</ul>
</div>