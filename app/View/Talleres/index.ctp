<div class="talleres index">
	<h2><?php echo __('Talleres');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('calificacion_id');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_razon_social_o_nombre_comercial');?></th>
			<th><?php echo $this -> Paginator -> sort('provincia_id');?></th>
			<th><?php echo $this -> Paginator -> sort('canton_id');?></th>
			<th><?php echo $this -> Paginator -> sort('ciudad_id');?></th>
			<th><?php echo $this -> Paginator -> sort('sector_id');?></th>
			<th><?php echo $this -> Paginator -> sort('parroquia_id');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_calle_o_avenida');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_numero');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_interseccion');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_barrio');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_telefono_celular');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_telefono_convencional');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_referencia');?></th>
			<th><?php echo $this -> Paginator -> sort('tal_email');?></th>
			<th><?php echo $this -> Paginator -> sort('created');?></th>
			<th><?php echo $this -> Paginator -> sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
$i = 0;
foreach ($talleres as $taller):
		?>
		<tr>
			<td><?php echo $this -> Html -> link($taller['Calificacion']['id'], array('controller' => 'calificaciones', 'action' => 'view', $taller['Calificacion']['id']));?></td>
			<td><?php echo h($taller['Taller']['tal_razon_social_o_nombre_comercial']);?>&nbsp;</td>
			<td><?php echo $this -> Html -> link($taller['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $taller['Provincia']['id']));?></td>
			<td><?php echo $this -> Html -> link($taller['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $taller['Canton']['id']));?></td>
			<td><?php echo $this -> Html -> link($taller['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $taller['Ciudad']['id']));?></td>
			<td><?php echo $this -> Html -> link($taller['Sector']['sec_nombre'], array('controller' => 'sectores', 'action' => 'view', $taller['Sector']['id']));?></td>
			<td><?php echo $this -> Html -> link($taller['Parroquia']['par_nombre'], array('controller' => 'parroquias', 'action' => 'view', $taller['Parroquia']['id']));?></td>
			<td><?php echo h($taller['Taller']['tal_calle_o_avenida']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['tal_numero']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['tal_interseccion']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['tal_barrio']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['tal_telefono_celular']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['tal_telefono_convencional']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['tal_referencia']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['tal_email']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['created']);?>&nbsp;</td>
			<td><?php echo h($taller['Taller']['modified']);?>&nbsp;</td>
			<td class="actions"><?php echo $this -> Html -> link(__('View'), array('action' => 'view', $taller['Taller']['id']), array('class' => 'view'));?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $taller['Taller']['id']), array('class' => 'edit'));?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $taller['Taller']['id']), array('class' => 'delete'), __('Esta seguro que quiere eliminar el registro?', $taller['Taller']['id']));?></td>
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
		echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Agregar Taller'), array('action' => 'add'));?>
		</li>
	</ul>
</div>
