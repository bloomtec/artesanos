<div class="talleres index">
	<h2><?php echo __('Talleres');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('razon_social_o_nombre_comercial');?></th>
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
	foreach ($talleres as $taller): ?>
	<tr>
		<td><?php echo h($taller['Taller']['razon_social_o_nombre_comercial']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['pichincha']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['canton']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['parroquia']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['calle_o_avenida']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['numero']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['interseccion']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['barrio']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['telefono_celular']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['telefono_convencional']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['referencia']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($taller['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $taller['Artesano']['id'])); ?>
		</td>
		<td><?php echo h($taller['Taller']['created']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $taller['Taller']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $taller['Taller']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $taller['Taller']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $taller['Taller']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Taller'), array('action' => 'add')); ?></li>
	</ul>
</div>
