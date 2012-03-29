<div class="reportes form">
<h2><?php echo __('Reporte ingresos de inventarios');?></h2>
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
	//debug($reporteIngresos);
	for($i=0;$i < count($reporteIngresos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteIngresos[$i]['Proveedor']['pro_nombre_razon_social'];?> </td>
		<td><?php echo $reporteIngresos[$i]['Ciudad']['ciu_nombre'];?> </td>
		<td><?php echo $reporteIngresos[$i]['Persona']['per_nombres'];?> </td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_numero_de_memorandum'];?> </td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_asunto'];?> </td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_subtotal'];?> </td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_iva'];?> </td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_total'];?> </td>
		<td> 
			<?php
				foreach ($reporteIngresos[$i]['Item'] as $key => $value) {
					if ($reporteIngresos[$i]['Item'] != array())
						echo $value['ite_nombre'] . "<br />";
		
				}
			?> 
		</td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['created'];?> </td>
	</tr>
	<?php

	}
	?>
</table>

</div>