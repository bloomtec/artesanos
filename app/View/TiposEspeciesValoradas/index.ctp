<div class="TiposEspeciesValoradas index">
	<h2><?php echo __('Especies Valoradas');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('tip_nombre', 'Nombre');?></th>
			<th><?php echo $this -> Paginator -> sort('tip_codigo', 'Codigo');?></th>
			<th><?php echo $this -> Paginator -> sort('tip_valor_unitario', 'Valor Unitario');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php
$i = 0;
foreach ($tiposEspeciesValoradas as $tiposEspeciesValorada):
		?>
		<tr>
			<td><?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_nombre']);?>&nbsp;</td>
			<td><?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_codigo']);?>&nbsp;</td>
			<td><?php echo h($tiposEspeciesValorada['TiposEspeciesValorada']['tip_valor_unitario']);?>&nbsp;</td>
			<td class="actions"><?php echo $this -> Html -> link(__('View'), array('action' => 'view', $tiposEspeciesValorada['TiposEspeciesValorada']['id']), array('class' => 'view', 'title' => 'Ver'));?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $tiposEspeciesValorada['TiposEspeciesValorada']['id']), array('class' => 'edit', 'title' => 'Modificar'));?>
			<?php //echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $tiposEspeciesValorada['TiposEspeciesValorada']['id']), array('class' => 'delete', 'title' => 'Borrar'), __('Esta seguro que quiere eliminar el registro?', $tiposEspeciesValorada['TiposEspeciesValorada']['id']));?></td>
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
			<?php echo $this -> Html -> link(__('Agregar Especies Valorada'), array('action' => 'add'));?>
		</li>
	</ul>
</div>
