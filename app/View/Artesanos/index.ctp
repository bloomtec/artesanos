<div class="artesanos index">
	<h2><?php echo __('Artesanos');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
									<th><?php echo $this->Paginator->sort('art_cedula');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('modified');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($artesanos as $artesano): ?>
	<tr>
		<td><?php echo h($artesano['Artesano']['art_cedula']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['created']); ?>&nbsp;</td>
		<td><?php echo h($artesano['Artesano']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'view')))) {
					echo $this->Html->link(__('View'), array('action' => 'view', $artesano['Artesano']['id']),array('class'=>'view'));
				}
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'edit')))) {
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $artesano['Artesano']['id']),array('class'=>'edit'));
				}
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'delete')))) {
					echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $artesano['Artesano']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $artesano['Artesano']['id']));
				}
			?>
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
		<li><?php echo $this->Html->link(__('Agregar Artesano'), array('action' => 'add')); ?></li>
	</ul>
</div>
