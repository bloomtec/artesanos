<?php if($ingresos==false) { ?>
<div class="reportes form">
	<?php echo $this -> Form -> create('IngresosEspecie');?>
	<h2><?php echo __('Reporte ingresos de especies'); ?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('tipo', array('type' => 'select', 'label' => 'Tipo De Especie', 'options' => $tipos_de_especie));
		echo $this -> Form -> input('serial', array('type' => 'text', 'label' => 'Serial', 'class' => 'number'));
		echo $this -> Form -> input('fecha', array('type' => 'text', 'label' => 'Fecha', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?> 
	<?php echo $this -> Form -> end();?>
</div>
<?php } else { ?>
<br />
<br />
<h2><?php echo __('Reporte ingresos de especies');?></h2>
<table>
	<tr>
		<th>Proveedor</th>
		<th>Ciudad</th>
		<th>Persona</th>
		<th># Memorando</th>
		<th>Asunto</th>
		<th>Sub total</th>
		<th>IVA</th>
		<th>Total</th>
		<th>Items</th>
		<th>Fecha</th>
	</tr>
	<?php
	//debug($ingresosIngresos);
	for($i=0;$i < count($ingresosIngresos);$i++) {
	?>
	<tr>
		<td><?php echo $ingresosIngresos[$i]['Proveedor']['pro_nombre_razon_social'];?> </td>
		<td><?php echo $ingresosIngresos[$i]['Ciudad']['ciu_nombre'];?> </td>
		<td><?php echo $ingresosIngresos[$i]['Persona']['per_nombres'];?> </td>
		<td><?php echo $ingresosIngresos[$i]['IngresosDeInventario']['ing_numero_de_memorandum'];?> </td>
		<td><?php echo $ingresosIngresos[$i]['IngresosDeInventario']['ing_asunto'];?> </td>
		<td><?php echo $ingresosIngresos[$i]['IngresosDeInventario']['ing_subtotal'];?> </td>
		<td><?php echo $ingresosIngresos[$i]['IngresosDeInventario']['ing_iva'];?> </td>
		<td><?php echo $ingresosIngresos[$i]['IngresosDeInventario']['ing_total'];?> </td>
		<td> 
			<?php
				foreach ($ingresosIngresos[$i]['Item'] as $key => $value) {
					if ($ingresosIngresos[$i]['Item'] != array())
						echo $value['ite_nombre'] . "<br />";
				}
			?> 
		</td>
		<td><?php echo $ingresosIngresos[$i]['IngresosDeInventario']['created'];?> </td>
	</tr>
	<?php

	}
	?>
</table>

	<a class='button' href="/ingresosDeInventarios/reporteIngresosInventarios">Volver</a>
	&nbsp;
	<a class='button' href="/ingresosDeInventarios/impReporteIngresosInventarios">Descargar pdf</a>
	&nbsp;
	<a class='button' href="/ingresosDeInventarios/export_csv">Exportar a CSV</a>

<?php } ?>