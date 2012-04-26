<div class="profesores index">
	<h2><?php echo __('Profesores');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('centros_artesanal_id', 'Centro o Unidad Artesanal');?></th>
			<th><?php echo $this -> Paginator -> sort('pro_nombres', 'Nombres');?></th>
			<th><?php echo $this -> Paginator -> sort('pro_documento_de_identificacion', 'Documento De Identificacion');?></th>
			<th><?php echo $this -> Paginator -> sort('pro_direccion', 'Direccion');?></th>
			<th><?php echo $this -> Paginator -> sort('pro_telefono', 'Teléfono');?></th>
			<th><?php echo $this -> Paginator -> sort('pro_sexo', 'Sexo');?></th>
			<th><?php echo $this -> Paginator -> sort('pro_nacionalidad', 'Nacionalidad');?></th>
			<th><?php echo $this -> Paginator -> sort('pro_correo_electronico', 'Correo Electronico');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php
$i = 0;
foreach ($profesores as $profesor):
		?>
		<tr>
			<td><?php echo $this -> Html -> link($profesor['CentrosArtesanal']['cen_nombre'], array('controller' => 'centros_artesanales', 'action' => 'view', $profesor['CentrosArtesanal']['id']));?></td>
			<td><?php echo h($profesor['Profesor']['pro_nombres']);?>&nbsp;</td>
			<td><?php echo h($profesor['Profesor']['pro_documento_de_identificacion']);?>&nbsp;</td>
			<td><?php echo h($profesor['Profesor']['pro_direccion']);?>&nbsp;</td>
			<td><?php echo h($profesor['Profesor']['pro_telefono']);?>&nbsp;</td>
			<td><?php echo h($profesor['Profesor']['pro_sexo']);?>&nbsp;</td>
			<td><?php echo h($profesor['Profesor']['pro_nacionalidad']);?>&nbsp;</td>
			<td><?php echo h($profesor['Profesor']['pro_correo_electronico']);?>&nbsp;</td>
			<td class="actions"><?php echo $this -> Html -> link(__('View'), array('action' => 'view', $profesor['Profesor']['id']), array('class' => 'view', 'title' => 'Ver'));?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $profesor['Profesor']['id']), array('class' => 'edit', 'title' => 'Modificar'));?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $profesor['Profesor']['id']), array('class' => 'delete', 'title' => 'Borrar'), __('Esta seguro que quiere eliminar el registro?', $profesor['Profesor']['id']));?></td>
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
			<?php echo $this -> Html -> link(__('Agregar Profesor'), array('action' => 'add'));?>
		</li>
	</ul>
</div>
