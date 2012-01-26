<div class="trabajadores index">
	<h2><?php echo __('Trabajadores');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('operario');?></th>
							<th><?php echo $this->Paginator->sort('cedula');?></th>
							<th><?php echo $this->Paginator->sort('fecha_de_ingreso');?></th>
							<th><?php echo $this->Paginator->sort('afiliado_seguro');?></th>
							<th><?php echo $this->Paginator->sort('edad');?></th>
							<th><?php echo $this->Paginator->sort('pago_mensual');?></th>
							<th><?php echo $this->Paginator->sort('taller_id');?></th>
							<th><?php echo $this->Paginator->sort('local_id');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($trabajadores as $trabajador): ?>
	<tr>
		<td><?php echo h($trabajador['Trabajador']['operario']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['cedula']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['fecha_de_ingreso']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['afiliado_seguro']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['edad']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['pago_mensual']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trabajador['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $trabajador['Taller']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($trabajador['Local']['id'], array('controller' => 'locales', 'action' => 'view', $trabajador['Local']['id'])); ?>
		</td>
		<td><?php echo h($trabajador['Trabajador']['created']); ?>&nbsp;</td>
		<td><?php echo h($trabajador['Trabajador']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trabajador['Trabajador']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trabajador['Trabajador']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trabajador['Trabajador']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $trabajador['Trabajador']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Trabajador'), array('action' => 'add')); ?></li>
	</ul>
</div>
