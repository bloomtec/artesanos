<div class="parroquias index">
	<h2><?php echo __('Facturas de ventas');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('Factura.fac_numero', 'Factura');?></th>
			<th><?php echo $this -> Paginator -> sort('Factura.fac_comprobante_deposito', 'Comprobante');?></th>
			<th><?php echo $this -> Paginator -> sort('Factura.fac_cliente', 'Cliente');?></th>
			<th><?php echo $this -> Paginator -> sort('VentasEspecie.ven_cantidad', 'Cantidad');?></th>
			<th>Detalles</th>
			<th><?php echo $this -> Paginator -> sort('VentasEspecie.ven_valor', 'Total');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php for($i=0; $i<count($ventasEspecies); $i++) { ?>
		<tr>
		<td><?php echo $ventasEspecies[$i]["Factura"]["fac_numero"];?></td>
		<td><?php echo $ventasEspecies[$i]["Factura"]["fac_comprobante_deposito"];?></td>
		<td><?php echo $ventasEspecies[$i]["Factura"]["fac_cliente"];?></td>
		<td><?php echo $ventasEspecies[$i]["VentasEspecie"]["ven_cantidad"];?></td>
		<td>
		<ul>
			<?php
			foreach ($ventasEspecies[$i]["EspeciesValorada"] as $especieValorada) {
				echo "<li>" . $especieValorada["nombre_especie"] . " (" . $especieValorada["id"] . ") - Valor Unitario: <b>" . $especieValorada["valor_unitario"] . "</b></li>";
			}
			?>
		</ul></td>
		<td><?php echo $ventasEspecies[$i]["VentasEspecie"]["ven_valor"];?></td>
		<td class="actions"><?php echo $this -> Html -> link(__('Factura'), array('action' => 'factura', $ventasEspecies[$i]["VentasEspecie"]['factura_id']), array('class' => 'factura', 'title' => 'Factura'));?></td>
		</tr> 
		<?php }?>
	</table>
	<div class="paging">
		<!--<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
		));
		?>  </p>-->
		<?php
		echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this -> Paginator -> last('>> ', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>