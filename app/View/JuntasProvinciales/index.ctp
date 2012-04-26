<div class="juntasProvinciales index">
	<h2><?php echo __('Juntas Provinciales');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('provincia_id', 'Provincia');?></th>
			<th><?php echo $this -> Paginator -> sort('jun_nombre', 'Nombre');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php $i = 0; foreach ($juntasProvinciales as $juntasProvincial): ?>
		<tr>
			<td><?php echo h($juntasProvincial['Provincia']['pro_nombre']);?>&nbsp;</td>
			<td><?php echo h($juntasProvincial['JuntasProvincial']['jun_nombre']);?>&nbsp;</td>
			<td class="actions"><?php echo $this -> Html -> link(__('View'), array('action' => 'view', $juntasProvincial['JuntasProvincial']['id']), array('class' => 'view', 'title' => 'Ver'));?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $juntasProvincial['JuntasProvincial']['id']), array('class' => 'edit', 'title' => 'Modificar'));?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $juntasProvincial['JuntasProvincial']['id']), array('class' => 'delete', 'title' => 'Borrar'), __('Esta seguro que quiere eliminar el registro?', $juntasProvincial['JuntasProvincial']['id']));?></td>
		</tr>
		<?php endforeach;?>
	</table>
	<div class="paging">
		<!--<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
		));
		?>	</p>-->
		<?php
		echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this -> Paginator -> last('>> ', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Agregar Junta Provincial'), array('action' => 'add'));?>
		</li>
	</ul>
</div>