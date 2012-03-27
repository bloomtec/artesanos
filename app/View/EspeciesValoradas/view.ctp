<div class="especiesValoradas view">
<h2><?php  echo __('Especies Valorada');?></h2>
		<label><?php echo __('Esp Nombre'); ?></label>
		<h3>
			<?php echo h($especiesValorada['EspeciesValorada']['esp_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Esp Codigo'); ?></label>
		<h3>
			<?php echo h($especiesValorada['EspeciesValorada']['esp_codigo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Esp Cantidad'); ?></label>
		<h3>
			<?php echo h($especiesValorada['EspeciesValorada']['esp_cantidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Esp Valor Unitario'); ?></label>
		<h3>
			<?php echo h($especiesValorada['EspeciesValorada']['esp_valor_unitario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($especiesValorada['EspeciesValorada']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Especies Valoradas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Especies Valorada'), array('action' => 'edit', $especiesValorada['EspeciesValorada']['id'])); ?> </li>
	</ul>
</div>