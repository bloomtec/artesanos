<div class="feriados index">
	<h2><?php echo __('Feriados');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('fer_nombre', 'Nombre');?></th>
		<th><?php echo $this->Paginator->sort('fer_fecha', 'Fecha');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($feriados as $feriado) :
	?>
	<tr>
		<td><?php echo h($feriado['Feriado']['fer_nombre']); ?>&nbsp;</td>
		<td><?php echo h($feriado['Feriado']['fer_fecha']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feriado['Feriado']['id']),array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feriado['Feriado']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $feriado['Feriado']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Feriado'), array('action' => 'add')); ?></li>
	</ul>
</div>
