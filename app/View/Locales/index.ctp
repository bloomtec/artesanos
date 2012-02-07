<div class="locales index">
	<h2><?php echo __('Locales');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('calificacion_id');?></th>
							<th><?php echo $this->Paginator->sort('provincia_id');?></th>
							<th><?php echo $this->Paginator->sort('canton_id');?></th>
							<th><?php echo $this->Paginator->sort('ciudad_id');?></th>
							<th><?php echo $this->Paginator->sort('parroquia_id');?></th>
							<th><?php echo $this->Paginator->sort('loc_calle_o_avenida');?></th>
							<th><?php echo $this->Paginator->sort('loc_numero');?></th>
							<th><?php echo $this->Paginator->sort('loc_interseccion');?></th>
							<th><?php echo $this->Paginator->sort('loc_barrio');?></th>
							<th><?php echo $this->Paginator->sort('loc_telefono_celular');?></th>
							<th><?php echo $this->Paginator->sort('loc_telefono_convencional');?></th>
							<th><?php echo $this->Paginator->sort('loc_referencia');?></th>
							<th><?php echo $this->Paginator->sort('loc_email');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($locales as $local): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($local['Calificacion']['id'], array('controller' => 'calificaciones', 'action' => 'view', $local['Calificacion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($local['Provincia']['id'], array('controller' => 'provincias', 'action' => 'view', $local['Provincia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($local['Canton']['id'], array('controller' => 'cantones', 'action' => 'view', $local['Canton']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($local['Ciudad']['id'], array('controller' => 'ciudades', 'action' => 'view', $local['Ciudad']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($local['Parroquia']['id'], array('controller' => 'parroquias', 'action' => 'view', $local['Parroquia']['id'])); ?>
		</td>
		<td><?php echo h($local['Local']['loc_calle_o_avenida']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['loc_numero']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['loc_interseccion']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['loc_barrio']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['loc_telefono_celular']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['loc_telefono_convencional']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['loc_referencia']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['loc_email']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['created']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $local['Local']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $local['Local']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $local['Local']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $local['Local']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Local'), array('action' => 'add')); ?></li>
	</ul>
</div>
