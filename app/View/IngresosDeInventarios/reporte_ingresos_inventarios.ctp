<?php if(isset($lstProveedores)) {
?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2><?php echo __('Reporte De Calificaciones Por Operador'); ?></h2>
	<fieldset>
		<?php
		//Proveedores
		echo $this -> Form -> input('proveedor', array('type' => 'select', 'label' => 'Proveedores', 'empty' => 'Seleccione...', 'options' => $lstProveedores));

		//Personas
		echo $this -> Form -> input('persona', array('type' => 'select', 'label' => 'Personas', 'empty' => 'Seleccione...', 'options' => $lstPersonas));

		//Departamentos
		echo $this -> Form -> input('departamento', array('type' => 'select', 'label' => 'Departamentos', 'empty' => 'Seleccione...', 'options' => $lstDepartamentos));

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
<br />
<br />
<h2><?php echo __('Reporte egresos de inventarios');?></h2>
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

	<a class='button' href="/ingresosDeInventarios/reporteIngresosInventarios">Volver</a>
	&nbsp;
	<a class='button' href="/ingresosDeInventarios/impReporteIngresosInventarios">Imprimir</a>
	&nbsp;
	<a class='button' href="/ingresosDeInventarios/export_csv">Exportar el resulrado a CSV</a>

<?php } ?>
