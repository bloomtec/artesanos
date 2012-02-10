<div class="balances index">
	<h2><?php echo __('Balances');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('calificacion_id');?></th>
							<th><?php echo $this->Paginator->sort('bal_domicilio_propio');?></th>
							<th><?php echo $this->Paginator->sort('bal_domicilio_valor');?></th>
							<th><?php echo $this->Paginator->sort('bal_taller_propio');?></th>
							<th><?php echo $this->Paginator->sort('bal_taller_valor');?></th>
							<th><?php echo $this->Paginator->sort('bal_agua');?></th>
							<th><?php echo $this->Paginator->sort('bal_luz');?></th>
							<th><?php echo $this->Paginator->sort('bal_telefono');?></th>
							<th><?php echo $this->Paginator->sort('bal_servicios_basicos');?></th>
							<th><?php echo $this->Paginator->sort('bal_compras_de_materia_prima_mensuales');?></th>
							<th><?php echo $this->Paginator->sort('bal_salario_operarios');?></th>
							<th><?php echo $this->Paginator->sort('bal_salario_aprendices');?></th>
							<th><?php echo $this->Paginator->sort('bal_otros_salarios');?></th>
							<th><?php echo $this->Paginator->sort('bal_maquinas_y_herramientas');?></th>
							<th><?php echo $this->Paginator->sort('bal_materia_prima');?></th>
							<th><?php echo $this->Paginator->sort('bal_elaborados');?></th>
							<th><?php echo $this->Paginator->sort('bal_ingresos_por_ventas');?></th>
							<th><?php echo $this->Paginator->sort('bal_otros_ingresos');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($balances as $balance): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($balance['Calificacion']['id'], array('controller' => 'calificaciones', 'action' => 'view', $balance['Calificacion']['id'])); ?>
		</td>
		<td><?php echo h($balance['Balance']['bal_domicilio_propio']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_domicilio_valor']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_taller_propio']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_taller_valor']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_agua']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_luz']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_telefono']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_servicios_basicos']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_compras_de_materia_prima_mensuales']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_salario_operarios']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_salario_aprendices']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_otros_salarios']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_maquinas_y_herramientas']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_materia_prima']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_elaborados']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_ingresos_por_ventas']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['bal_otros_ingresos']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['created']); ?>&nbsp;</td>
		<td><?php echo h($balance['Balance']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $balance['Balance']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $balance['Balance']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $balance['Balance']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $balance['Balance']['id'])); ?>
		</td>
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
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Balance'), array('action' => 'add')); ?></li>
	</ul>
</div>
