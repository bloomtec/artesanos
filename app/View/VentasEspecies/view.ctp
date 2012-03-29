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
			<th><?php echo $this -> Paginator -> sort('TiposEspeciesValorada.tip_nombre', 'Tipo Especie'); ?></th>
			<th><?php echo $this -> Paginator -> sort('esp_serie', 'Serie'); ?></th>
			<th><?php echo $this -> Paginator -> sort('TiposEspeciesValorada.tip_valor_unitario', 'Valor Unitario'); ?></th>
		</tr>
		<?php foreach($especiesValoradas as $key => $especieValorada) : ?>
		<tr>
			<td><?php echo h($especieValorada['TiposEspeciesValorada']['tip_nombre']); ?></td>
			<td><?php echo h($especieValorada['EspeciesValorada']['esp_serie']); ?></td>
			<td><?php echo h($especieValorada['TiposEspeciesValorada']['tip_valor_unitario']); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div class="paging">
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
	));
	?>	</p>-->
	<?php
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Ventas Especies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Ventas Especie'), array('action' => 'edit', $ventasEspecie['VentasEspecie']['id'])); ?> </li>
	</ul>
</div>