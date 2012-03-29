<div class="reportes form">
	<?php echo $this -> Form -> create('IngresosEspecie');?>
	<h2><?php echo __('Reporte ingresos de especies'); ?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('fecha_inicio', array('type' => 'text', 'label' => 'Fecha Inicio', 'class' => 'date'));
		echo $this -> Form -> input('fecha_fin', array('type' => 'text', 'label' => 'Fecha Fin', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?> 
	<?php echo $this -> Form -> end();?>
</div>
<br />
<br />
<h2><?php echo __('Reporte ingresos de especies');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('ing_fecha', 'Fecha'); ?></th>
		<th><?php echo $this -> Paginator -> sort('ing_cantidad_total', 'Cantidad'); ?></th>
	</tr>
	<?php foreach($ingresos as $key => $ingreso) : ?>
	<tr>
		<td><?php echo $ingreso['IngresosEspecie']['ing_fecha']; ?> </td>
		<td><?php echo $ingreso['IngresosEspecie']['ing_cantidad_total']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>