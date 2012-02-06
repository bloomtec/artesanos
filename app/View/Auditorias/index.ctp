<div class="auditorias index">
	<h2><?php echo __('Auditorias');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('usuario_id');?></th>
							<th><?php echo $this->Paginator->sort('aud_nombre_modelo');?></th>
							<th><?php echo $this->Paginator->sort('aud_llave_foranea');?></th>
							<th><?php echo $this->Paginator->sort('aud_datos_previos');?></th>
							<th><?php echo $this->Paginator->sort('aud_datos_nuevos');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($auditorias as $auditoria): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($auditoria['Usuario']['usu_nombre_de_usuario'], array('controller' => 'usuarios', 'action' => 'view', $auditoria['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($auditoria['Auditoria']['aud_nombre_modelo']); ?>&nbsp;</td>
		<td><?php echo h($auditoria['Auditoria']['aud_llave_foranea']); ?>&nbsp;</td>
		<td><?php echo h($auditoria['Auditoria']['aud_datos_previos']); ?>&nbsp;</td>
		<td><?php echo h($auditoria['Auditoria']['aud_datos_nuevos']); ?>&nbsp;</td>
		<td><?php echo h($auditoria['Auditoria']['created']); ?>&nbsp;</td>
		<td><?php echo h($auditoria['Auditoria']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $auditoria['Auditoria']['id']),array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $auditoria['Auditoria']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $auditoria['Auditoria']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $auditoria['Auditoria']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Auditoria'), array('action' => 'add')); ?></li>
	</ul>
</div>
