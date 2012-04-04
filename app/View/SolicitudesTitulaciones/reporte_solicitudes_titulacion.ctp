<?php if($reporte==false) {?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2>
		<?php echo __('Reporte solicitudes titulación'); ?>
	</h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('rama', array('type' => 'select', 'label' => 'Ramas', 'empty' => 'Seleccione...', 'options' => $ramas));
		echo $this -> Form -> input('titulo', array('type' => 'select', 'label' => 'Titulos', 'empty' => 'Seleccione...', 'options' => $titulos));
		echo $this -> Form -> input('fecha1', array('type' => 'text', 'label' => 'Fecha inicial', 'class' => 'date'));
		echo $this -> Form -> input('fecha2', array('type' => 'text', 'label' => 'Fecha final', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>
<?php } else {  /*debug($reporteIngresos);*/?>
<br />
<br />
<h2><?php echo __('Reporte solicitudes titulación');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('id', 'Id solicitud');?></th>
		<th><?php echo $this -> Paginator -> sort('tit_nombre', 'Titulo');?></th>
		<th><?php echo $this -> Paginator -> sort('est_estado', 'Estado');?></th>
		<th><?php echo $this -> Paginator -> sort('tip_nombre', 'Tipo solicitud');?></th>
		<th><?php echo $this -> Paginator -> sort('nombre_completo', 'Artesano');?></th>
		<th><?php echo $this -> Paginator -> sort('sol_mensaje', 'Mensaje');?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha');?></th>
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
<div class="paging">
	
	<?php
	echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> numbers(array('separator' => ''));
	echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	echo $this -> Paginator -> last('>> ', array(), null, array('class' => 'next disabled'));
	?>
</div>
<a class='button' href="/ingresosDeInventarios/reporteIngresosInventarios">Volver</a>
&nbsp; <a class='button' href="/ingresosDeInventarios/impReporte">Descargar pdf</a>
&nbsp; <a class='button' href="/ingresosDeInventarios/export_csv">Exportar a CSV</a>
<?php }?>
<!--

<?php if($reporte==false) {?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2>
		<?php
	
	if (!empty($titulo)){
		echo __('Reporte ingresos de suministros');
	} else {
		echo __('Reporte ingresos de inventarios');
	}
	?>
	</h2>
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
<?php } else {  /*debug($reporteIngresos);*/?>
<br />
<br />
<h2><?php echo __('Reporte ingresos de inventarios');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('proveedor_id', 'Proveedor');?></th>
		<th><?php echo $this -> Paginator -> sort('ciudad_id', 'Ciudad');?></th>
		<th><?php echo $this -> Paginator -> sort('persona_id', 'Persona');?></th>
		<th><?php echo $this -> Paginator -> sort('ing_numero_de_memorandum', '# Memorando');?></th>
		<th><?php echo $this -> Paginator -> sort('ing_asunto', 'Asunto');?></th>
		<th><?php echo $this -> Paginator -> sort('ing_subtotal', 'Sub total');?></th>
		<th><?php echo $this -> Paginator -> sort('ing_iva', 'Iva');?></th>
		<th><?php echo $this -> Paginator -> sort('ing_total', 'Total');?></th>
		<th><?php echo $this -> Paginator -> sort('Item', 'Items');?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha');?></th>
	</tr>
	<?php
//debug($reporteIngresos);
for($i=0;$i < count($reporteIngresos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteIngresos[$i]['Proveedor']['pro_nombre_razon_social'];?></td>
		<td><?php echo $reporteIngresos[$i]['Ciudad']['ciu_nombre'];?></td>
		<td><?php echo $reporteIngresos[$i]['Persona']['per_nombres'];?></td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_numero_de_memorandum'];?></td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_asunto'];?></td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_subtotal'];?></td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_iva'];?></td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['ing_total'];?></td>
		<td><?php
		foreach ($reporteIngresos[$i]['Item'] as $key => $value) {
			if ($reporteIngresos[$i]['Item'] != array())
				echo $value['ite_nombre'] . "<br />";
		}
		?></td>
		<td><?php echo $reporteIngresos[$i]['IngresosDeInventario']['created'];?></td>
	</tr>
	<?php

	}
	?>
</table>
<div class="paging">
	
	<?php
	echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> numbers(array('separator' => ''));
	echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	echo $this -> Paginator -> last('>> ', array(), null, array('class' => 'next disabled'));
	?>
</div>
<a class='button' href="/ingresosDeInventarios/reporteIngresosInventarios">Volver</a>
&nbsp; <a class='button' href="/ingresosDeInventarios/impReporte">Descargar pdf</a>
&nbsp; <a class='button' href="/ingresosDeInventarios/export_csv">Exportar a CSV</a>
<?php }?>
-->