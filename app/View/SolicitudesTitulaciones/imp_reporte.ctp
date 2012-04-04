<div class="reportes form">

<h2><?php echo __('Reporte solicitudes titulación');?></h2>
<table>
	<tr>
		<th>Id solicitud</th>
		<th>Titulo</th>
		<th>Estado</th>
		<th>Tipo solicitud</th>
		<th>Artesano</th>
		<th>Mensaje</th>
		<th>Fecha</th>
	</tr>
<?php for($i=0;$i < count($reporteSolicitudesTitulacion);$i++) { ?>
	<tr>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['id'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['Titulo']['tit_nombre'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['EstadosSolicitudesTitulacion']['est_estado'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['TiposSolicitudesTitulacion']['tip_nombre'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['Artesano']['nombre_completo'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['sol_mensaje'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['created'];?></td>
	</tr>
	<?php

	}
	?>
</table>