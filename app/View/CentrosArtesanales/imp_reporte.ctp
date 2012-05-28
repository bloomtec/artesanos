
<h2><?php echo __('Reporte centros artesanales');?></h2>
<table>
	<tr>
		<th>RUC</th>
		<th>Nombre</th>
		<th>Provincia</th>
		<th>Canton</th>
		<th>Ciudad</th>
		<th>Parroquia</th>
		<th>Dirección</th>
		<th>Fecha creación</th>
	</tr>
	<?php
for($i=0;$i < count($reporteCentrosArtesanales);$i++) {
	?>
	<tr>
		<td><?php echo $reporteCentrosArtesanales[$i]["CentrosArtesanal"]["cen_ruc"]; ?></td>
		<td><?php echo $reporteCentrosArtesanales[$i]["CentrosArtesanal"]["cen_nombre"]; ?></td>
		<td><?php echo $reporteCentrosArtesanales[$i]["Provincia"]["pro_nombre"]; ?></td>
		<td><?php echo $reporteCentrosArtesanales[$i]["Canton"]["can_nombre"]; ?></td>
		<td><?php echo $reporteCentrosArtesanales[$i]["Ciudad"]["ciu_nombre"]; ?></td>
		<td><?php echo $reporteCentrosArtesanales[$i]["Parroquia"]["par_nombre"]; ?></td>
		<td><?php echo $reporteCentrosArtesanales[$i]["CentrosArtesanal"]["direccion"]; ?></td>
		<td><?php echo $reporteCentrosArtesanales[$i]["CentrosArtesanal"]["created"]; ?></td>
	</tr>
	<?php

	}
	?>
</table>
