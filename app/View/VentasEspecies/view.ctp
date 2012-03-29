<div class="ventasEspecies view">
<h2><?php  echo __('Ventas Especie');?></h2>
		<label><?php echo __('Juntas Provincial'); ?></label>
		<h3>
			<?php echo $this->Html->link($ventasEspecie['JuntasProvincial']['jun_nombre'], array('controller' => 'juntas_provinciales', 'action' => 'view', $ventasEspecie['JuntasProvincial']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Artesano'); ?></label>
		<h3>
			<?php echo $this->Html->link($ventasEspecie['Artesano']['nombre_completo'], array('controller' => 'artesanos', 'action' => 'view', $ventasEspecie['Artesano']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Total Vendidos'); ?></label>
		<h3>
			<?php echo h($ventasEspecie['VentasEspecie']['ven_cantidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Total Venta'); ?></label>
		<h3>
			<?php echo h($ventasEspecie['VentasEspecie']['ven_valor']); ?>
			&nbsp;
		</h3>
	
</div>
<div style="clear: both;"></div>
<div class="related">
	<h2><?php echo __('Especies Valoradas Relacionadas'); ?></h2>
	<table>
		<tr>
			<th>Tipo Especie</th>
			<th>Serie</th>
			<th>Valor Unitario</th>
		</tr>
		<?php foreach($especiesValoradas as $key => $especieValorada) : ?>
		<tr>
			<td><?php echo h($especieValorada['TiposEspeciesValorada']['tip_nombre']); ?></td>
			<td><?php echo h($especieValorada['EspeciesValorada']['esp_serie']); ?></td>
			<td><?php echo h($especieValorada['TiposEspeciesValorada']['tip_valor_unitario']); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Ventas Especies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Ventas Especie'), array('action' => 'edit', $ventasEspecie['VentasEspecie']['id'])); ?> </li>
	</ul>
</div>