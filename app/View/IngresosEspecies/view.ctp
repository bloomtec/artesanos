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
		<li><?php echo $this->Html->link(__('Volver Ingresos Especies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Ingresos Especie'), array('action' => 'edit', $ingresosEspecie['IngresosEspecie']['id'])); ?> </li>
	</ul>
</div>