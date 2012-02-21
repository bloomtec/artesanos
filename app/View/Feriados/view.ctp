<div class="feriados view">
<h2><?php  echo __('Feriado');?></h2>
		<label><?php echo __('Fer Nombre'); ?></label>
		<h3>
			<?php echo h($feriado['Feriado']['fer_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fer Fecha'); ?></label>
		<h3>
			<?php echo h($feriado['Feriado']['fer_fecha']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($feriado['Feriado']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Feriados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Feriado'), array('action' => 'edit', $feriado['Feriado']['id'])); ?> </li>
	</ul>
</div>