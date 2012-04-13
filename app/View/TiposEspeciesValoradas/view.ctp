<div class="tiposEspeciesValoradas view">
<h2><?php  echo __('Tipos Especies Valorada');?></h2>
		<label><?php echo __('Tip Nombre'); ?></label>
		<h3>
			<?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tip Codigo'); ?></label>
		<h3>
			<?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_codigo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tip Valor Unitario'); ?></label>
		<h3>
			<?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_valor_unitario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Tipos Especies Valoradas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Tipos Especies Valorada'), array('action' => 'edit', $tiposEspeciesValorada['TiposEspeciesValorada']['id'])); ?> </li>
	</ul>
</div>