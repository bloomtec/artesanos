<div class="locales index">
	<h2><?php echo __('Locales');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('pichincha');?></th>
							<th><?php echo $this->Paginator->sort('canton');?></th>
							<th><?php echo $this->Paginator->sort('ciudad');?></th>
							<th><?php echo $this->Paginator->sort('parroquia');?></th>
							<th><?php echo $this->Paginator->sort('calle_o_avenida');?></th>
							<th><?php echo $this->Paginator->sort('numero');?></th>
							<th><?php echo $this->Paginator->sort('interseccion');?></th>
							<th><?php echo $this->Paginator->sort('barrio');?></th>
							<th><?php echo $this->Paginator->sort('telefono_celular');?></th>
							<th><?php echo $this->Paginator->sort('telefono_convencional');?></th>
							<th><?php echo $this->Paginator->sort('referencia');?></th>
							<th><?php echo $this->Paginator->sort('email');?></th>
							<th><?php echo $this->Paginator->sort('artesano_id');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($locales as $local): ?>
	<tr>
		<td><?php echo h($local['Local']['pichincha']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['canton']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['parroquia']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['calle_o_avenida']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['numero']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['interseccion']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['barrio']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['telefono_celular']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['telefono_convencional']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['referencia']); ?>&nbsp;</td>
		<td><?php echo h($local['Local']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($local['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $local['Artesano']['id'])); ?>
		</td>
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
