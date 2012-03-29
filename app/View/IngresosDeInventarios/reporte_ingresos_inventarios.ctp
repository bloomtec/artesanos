<?php if($reporte==false) { ?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2><?php echo __('Reporte ingresos de inventarios'); ?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('proveedor', array('type' => 'select', 'label' => 'Proveedores', 'empty' => 'Seleccione...', 'options' => $lstProveedores));
		echo $this -> Form -> input('persona', array('type' => 'select', 'label' => 'Personas', 'empty' => 'Seleccione...', 'options' => $lstPersonas));
		echo $this -> Form -> input('departamento', array('type' => 'select', 'label' => 'Departamentos', 'empty' => 'Seleccione...', 'options' => $lstDepartamentos));
		echo $this -> Form -> input('producto', array('type' => 'select', 'label' => 'Productos', 'empty' => '', 'options' => $lstProductos));
		echo $this -> Form -> input('fecha1', array('type' => 'text', 'label' => 'Fecha inicial', 'class' => 'date'));
		echo $this -> Form -> input('fecha2', array('type' => 'text', 'label' => 'Fecha final', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?> 
	<?php echo $this -> Form -> end();?>
</div>
<?php } else { ?>
<br />
<br />
<h2><?php echo __('Reporte ingresos de inventarios');?></h2>
<table>
	<tr>
		<th><?php echo $this->Paginator->sort('proveedor_id','Proveedor'); ?></th>
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

	<div class="paging">
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
	));
	?>	</p>-->
	<?php
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	<a class='button' href="/ingresosDeInventarios/reporteIngresosInventarios">Volver</a>
	&nbsp;
	<a class='button' href="/ingresosDeInventarios/impReporteIngresosInventarios">Descargar pdf</a>
	&nbsp;
	<a class='button' href="/ingresosDeInventarios/export_csv">Exportar a CSV</a>

<?php } ?>
