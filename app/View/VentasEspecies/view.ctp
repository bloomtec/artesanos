<div class="ventasEspecies view">
<h2><?php  echo __('Ventas Especie');?></h2>
		<label><?php echo __('Juntas Provincial'); ?></label>
		<h3>
			<?php echo $this->Html->link($ventasEspecie['JuntasProvincial']['jun_nombre'], array('controller' => 'juntas_provinciales', 'action' => 'view', $ventasEspecie['JuntasProvincial']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Artesano'); ?></label>
		<h3>
			<?php echo $this->Html->link($ventasEspecie['Artesano']['id'], array('controller' => 'artesanos', 'action' => 'view', $ventasEspecie['Artesano']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ven Serie Inicial'); ?></label>
		<h3>
			<?php echo h($ventasEspecie['VentasEspecie']['ven_serie_inicial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ven Serie Final'); ?></label>
		<h3>
			<?php echo h($ventasEspecie['VentasEspecie']['ven_serie_final']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ven Cantidad Total'); ?></label>
		<h3>
			<?php echo h($ventasEspecie['VentasEspecie']['ven_cantidad_total']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ven Valor Total'); ?></label>
		<h3>
			<?php echo h($ventasEspecie['VentasEspecie']['ven_valor_total']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Ventas Especies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Ventas Especie'), array('action' => 'edit', $ventasEspecie['VentasEspecie']['id'])); ?> </li>
	</ul>
</div>