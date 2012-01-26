<div class="inspecciones index">
	<h2><?php echo __('Inspecciones');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('usuario_id');?></th>
							<th><?php echo $this->Paginator->sort('artesano_id');?></th>
							<th><?php echo $this->Paginator->sort('taller_id');?></th>
							<th><?php echo $this->Paginator->sort('local_id');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($inspecciones as $inspeccion): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($inspeccion['Usuario']['usuario'], array('controller' => 'usuarios', 'action' => 'view', $inspeccion['Usuario']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inspeccion['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $inspeccion['Artesano']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inspeccion['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $inspeccion['Taller']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inspeccion['Local']['id'], array('controller' => 'locales', 'action' => 'view', $inspeccion['Local']['id'])); ?>
		</td>
		<td><?php echo h($inspeccion['Inspeccion']['created']); ?>&nbsp;</td>
		<td><?php echo h($inspeccion['Inspeccion']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $inspeccion['Inspeccion']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $inspeccion['Inspeccion']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $inspeccion['Inspeccion']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $inspeccion['Inspeccion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Inspeccion'), array('action' => 'add')); ?></li>
	</ul>
</div>
