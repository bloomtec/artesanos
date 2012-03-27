<div class="ingresosEspecies view">
<h2><?php  echo __('Ingresos Especie');?></h2>
		<label><?php echo __('Ing Fecha'); ?></label>
		<h3>
			<?php echo h($ingresosEspecie['IngresosEspecie']['ing_fecha']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ing Cantidad Total'); ?></label>
		<h3>
			<?php echo h($ingresosEspecie['IngresosEspecie']['ing_cantidad_total']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($ingresosEspecie['IngresosEspecie']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Ingresos Especies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Ingresos Especie'), array('action' => 'edit', $ingresosEspecie['IngresosEspecie']['id'])); ?> </li>
	</ul>
</div>