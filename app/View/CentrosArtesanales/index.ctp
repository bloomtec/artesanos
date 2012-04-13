<div class="centrosArtesanales index">
	<h2><?php echo __('Centros Artesanales');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('cen_ruc','Ruc');?></th>
		<th><?php echo $this->Paginator->sort('cen_nombre','Nombre');?></th>
		<th><?php echo $this->Paginator->sort('provincia_id','Provincia');?></th>
		<th><?php echo $this->Paginator->sort('canton_id','Canton');?></th>
		<th><?php echo $this->Paginator->sort('ciudad_id','Ciudad');?></th>
		<th><?php echo $this->Paginator->sort('parroquia_id','Parroquia');?></th>
		<th><?php echo $this->Paginator->sort('direccion','Dirección');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($centrosArtesanales as $centrosArtesanal): ?>
	<tr>
		<td><?php echo h($centrosArtesanal['CentrosArtesanal']['cen_ruc']); ?>&nbsp;</td>
		<td><?php echo h($centrosArtesanal['CentrosArtesanal']['cen_nombre']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($centrosArtesanal['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $centrosArtesanal['Provincia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($centrosArtesanal['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $centrosArtesanal['Canton']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($centrosArtesanal['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $centrosArtesanal['Ciudad']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($centrosArtesanal['Parroquia']['par_nombre'], array('controller' => 'parroquias', 'action' => 'view', $centrosArtesanal['Parroquia']['id'])); ?>
		</td>
		<td><?php echo h($centrosArtesanal['CentrosArtesanal']['direccion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $centrosArtesanal['CentrosArtesanal']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $centrosArtesanal['CentrosArtesanal']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $centrosArtesanal['CentrosArtesanal']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $centrosArtesanal['CentrosArtesanal']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Centro Artesanal'), array('action' => 'add')); ?></li>
	</ul>
</div>
