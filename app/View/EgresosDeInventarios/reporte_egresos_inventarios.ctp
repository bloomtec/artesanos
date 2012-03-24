<h2><?php echo __('Reporte egresos de inventarios');?></h2>
<?php if(isset($lstPersonas)) {
?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<fieldset>
		<?php
		//Personas
		echo $this -> Form -> input('persona', array('type' => 'select', 'label' => 'Personas', 'empty' => '', 'options' => $lstPersonas));

		//Departamentos
		echo $this -> Form -> input('departamento', array('type' => 'select', 'label' => 'Departamentos', 'empty' => '', 'options' => $lstDepartamentos));

		//Productos
		echo $this -> Form -> input('producto', array('type' => 'select', 'label' => 'Productos', 'empty' => '', 'options' => $lstProductos));

		//Fecha inicial
		echo $this -> Form -> input('fecha1', array('type' => 'text', 'label' => 'Fecha inicial', 'class' => 'date'));

		//Fecha Fecha final
		echo $this -> Form -> input('fecha2', array('type' => 'text', 'label' => 'Fecha final', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?> 
	<?php echo $this -> Form -> end();?>
</div>
<?php } else { ?>
<table>
	<tr>
		<th>Código egreso</th>
		<th>Persona</th>
		<th>Concepto de entrega</th>
		<th>Fecha egreso</th>
		<th>Items</th>
	</tr>
	<?php
	//debug($reporteEgresos);
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

	<a class='button' href="/egresosDeInventarios/reporteEgresosInventarios">Regresar</a>
	&nbsp;
	<a class='button' href="/egresosDeInventarios/impReporteEgresosInventarios">Imprimir</a>

<?php } ?>
