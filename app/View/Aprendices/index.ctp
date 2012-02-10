<div class="aprendices index">
	<h2><?php echo __('Aprendices');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('taller_id');?></th>
							<th><?php echo $this->Paginator->sort('apr_cedula');?></th>
							<th><?php echo $this->Paginator->sort('apr_nombres_y_apellidos');?></th>
							<th><?php echo $this->Paginator->sort('apr_sexo');?></th>
							<th><?php echo $this->Paginator->sort('apr_fecha_ingreso');?></th>
							<th><?php echo $this->Paginator->sort('apr_afiliado_seguro');?></th>
							<th><?php echo $this->Paginator->sort('apr_fecha_nacimiento');?></th>
							<th><?php echo $this->Paginator->sort('apr_pago_mensual');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($aprendices as $aprendiz): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($aprendiz['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $aprendiz['Taller']['id'])); ?>
		</td>
		<td><?php echo h($aprendiz['Aprendiz']['apr_cedula']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['apr_nombres_y_apellidos']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['apr_sexo']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['apr_fecha_ingreso']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['apr_afiliado_seguro']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['apr_fecha_nacimiento']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['apr_pago_mensual']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['created']); ?>&nbsp;</td>
		<td><?php echo h($aprendiz['Aprendiz']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aprendiz['Aprendiz']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aprendiz['Aprendiz']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aprendiz['Aprendiz']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $aprendiz['Aprendiz']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Aprendiz'), array('action' => 'add')); ?></li>
	</ul>
</div>
