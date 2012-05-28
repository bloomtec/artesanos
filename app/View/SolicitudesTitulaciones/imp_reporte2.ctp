<h2><?php echo __('Reporte titulaciones');?></h2>
<table>
	<tr>
		<th>Id titulacion</th>
		<th>Titulo</th>
		<th>Rama</th>
		<th>Provincia</th>
		<th>Cedula artesano</th>
		<th>Fecha</th>
	</tr>
<?php for($i=0;$i < count($reporteTitulaciones);$i++) { ?>
	<tr>
		<td><?php echo $reporteTitulaciones[$i]['Titulacion']['id'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['Titulo']['tit_nombre'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['Titulo']['nom_rama'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['JuntasProvincial']['nom_provincia'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['SolicitudesTitulacion']['cedula_artesano'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['Titulacion']['created'];?></td>
	</tr>
	<?php

	}
	?>
</table>

