<div class="TiposEspeciesValoradas view">
<h2><?php  echo __('Tipos de Especies Valorada');?></h2>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Codigo'); ?></label>
		<h3>
			<?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_codigo']); ?>
			&nbsp;
		</h3>
		
		<label><?php echo __('Valor Unitario'); ?></label>
		<h3>
			<?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_valor_unitario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Especies Valoradas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Especies Valorada'), array('action' => 'edit', $tiposEspeciesValorada['TiposEspeciesValorada']['id'])); ?> </li>
	</ul>
</div>