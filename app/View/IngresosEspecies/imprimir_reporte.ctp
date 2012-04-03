<div class="reportes form">
<h2><?php echo __('Reporte ingresos de especies');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('IngresosEspecie.ing_fecha', 'Fecha De Ingreso'); ?></th>
		<th><?php echo $this -> Paginator -> sort('esp_serie', 'Serie Especie Valorada'); ?></th>
		<th><?php echo $this -> Paginator -> sort('TiposEspeciesValorada.tip_nombre', 'Tipo Especie Valorada'); ?></th>
	</tr>
	<?php
		foreach($especies as $key => $especie) :
	?>
	<tr>
		<td><?php echo $especie['IngresosEspecie']['ing_fecha']; ?> </td>
		<td><?php echo $especie['EspeciesValorada']['esp_serie']; ?></td>
		<td><?php echo $especie['TiposEspeciesValorada']['tip_nombre']; ?> </td>
	</tr>
	<?php
		endforeach;
	?>
</table>