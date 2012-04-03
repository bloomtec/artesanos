<div class="reportes form">
<h2><?php echo __('Reporte egresos de inventarios');?></h2>
<table>
	<tr>
		<th>Código egreso</th>
		<th>Persona</th>
		<th>Concepto de entrega</th>
		<th>Fecha egreso</th>
		<th>Items</th>
	</tr>
	<?php
	
	for($i=0;$i < count($reporteEgresos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteEgresos[$i]['EgresosDeInventario']['egr_codigo'];?> </td>
		<td><?php echo $reporteEgresos[$i]['Persona']['per_nombres'];?> </td>
		<td><?php echo $reporteEgresos[$i]['EgresosDeInventario']['egr_concepto_entrega'];?> </td>
		<td><?php echo $reporteEgresos[$i]['EgresosDeInventario']['egr_fecha_de_egreso'];?> </td>
		<td> 
			<?php
				foreach ($reporteEgresos[$i]['Item'] as $key => $value) {
					if ($reporteEgresos[$i]['Item'] != array())
						echo $value['ite_nombre'] . "<br />";
		
				}
			?> 
		</td>
	</tr>
	<?php

	}
	?>
</table>


</div>