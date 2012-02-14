<div class="calificaciones index">
	<h2><?php echo __('Calificaciones');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('rama_id');?></th>
							<th><?php echo $this->Paginator->sort('artesano_id');?></th>
							<th><?php echo $this->Paginator->sort('tipos_de_calificacion_id');?></th>
							<th><?php echo $this->Paginator->sort('cal_estado');?></th>
							<th><?php echo $this->Paginator->sort('cal_inspector_local');?></th>
							<th><?php echo $this->Paginator->sort('cal_fecha_inspeccion_local');?></th>
							<th><?php echo $this->Paginator->sort('cal_inspector_taller');?></th>
							<th><?php echo $this->Paginator->sort('cal_fecha_inspeccion_taller');?></th>
							<th><?php echo $this->Paginator->sort('cal_fecha_expiracion');?></th>
							<th><?php echo $this->Paginator->sort('cal_domicilio_propio');?></th>
							<th><?php echo $this->Paginator->sort('cal_domicilio_valor');?></th>
							<th><?php echo $this->Paginator->sort('cal_taller_propio');?></th>
							<th><?php echo $this->Paginator->sort('cal_taller_valor');?></th>
							<th><?php echo $this->Paginator->sort('cal_agua');?></th>
							<th><?php echo $this->Paginator->sort('cal_luz');?></th>
							<th><?php echo $this->Paginator->sort('cal_telefono');?></th>
							<th><?php echo $this->Paginator->sort('cal_servicios_basicos');?></th>
							<th><?php echo $this->Paginator->sort('cal_compra_de_materia_prima_mensual');?></th>
							<th><?php echo $this->Paginator->sort('cal_salario_operarios');?></th>
							<th><?php echo $this->Paginator->sort('cal_salario_aprendices');?></th>
							<th><?php echo $this->Paginator->sort('cal_otros_salarios');?></th>
							<th><?php echo $this->Paginator->sort('cal_maquinas_y_herramientas');?></th>
							<th><?php echo $this->Paginator->sort('cal_materia_prima');?></th>
							<th><?php echo $this->Paginator->sort('cal_productos_elaborados');?></th>
							<th><?php echo $this->Paginator->sort('cal_ingresos_por_ventas');?></th>
							<th><?php echo $this->Paginator->sort('cal_otros_ingresos');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($calificaciones as $calificacion): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($calificacion['Rama']['ram_nombre'], array('controller' => 'ramas', 'action' => 'view', $calificacion['Rama']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($calificacion['Artesano']['id'], array('controller' => 'artesanos', 'action' => 'view', $calificacion['Artesano']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($calificacion['TiposDeCalificacion']['tip_nombre'], array('controller' => 'tipos_de_calificaciones', 'action' => 'view', $calificacion['TiposDeCalificacion']['id'])); ?>
		</td>
		<td><?php echo h($calificacion['Calificacion']['cal_estado']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_inspector_local']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_fecha_inspeccion_local']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_inspector_taller']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_fecha_inspeccion_taller']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_fecha_expiracion']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_domicilio_propio']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_domicilio_valor']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_taller_propio']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_taller_valor']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_agua']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_luz']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_telefono']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_servicios_basicos']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_compra_de_materia_prima_mensual']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_salario_operarios']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_salario_aprendices']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_otros_salarios']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_maquinas_y_herramientas']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_materia_prima']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_productos_elaborados']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_ingresos_por_ventas']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['cal_otros_ingresos']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['created']); ?>&nbsp;</td>
		<td><?php echo h($calificacion['Calificacion']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $calificacion['Calificacion']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $calificacion['Calificacion']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $calificacion['Calificacion']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $calificacion['Calificacion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Calificacion'), array('action' => 'add')); ?></li>
	</ul>
</div>
