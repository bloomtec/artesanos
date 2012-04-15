<!-- Reporte de Alumnos por provincia,  fecha ingreso
en el momento la tabla alumno no tiene provincia, entonces hay que agregarsela -->
<!-- Reporte por provincia, fecha de creación. -->
<?php if($reporte==false) {
?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2>
		<?php echo __('Reporte de alumnos'); ?>
	</h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('provincia', array('type' => 'select', 'label' => 'Provincias', 'empty' => 'Seleccione...', 'options' => $provincias));
		echo $this -> Form -> input('fecha_creacion', array('value' => '', 'type' => 'text', 'label' => 'Fecha creación', 'class' => 'date'));
		echo $this -> Form -> input('fecha1', array('value' => '', 'type' => 'text', 'label' => 'Fecha inicial', 'class' => 'date'));
		echo $this -> Form -> input('fecha2', array('value' => '', 'type' => 'text', 'label' => 'Fecha final', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>
<?php } else {  /*debug($reporteIngresos);*/?>
<br />
<br />
<h2><?php echo __('Reporte centros alumnos');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('alu_documento_de_identificaicon', 'Doc. identificación');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_nombres', 'Nombres');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_apellidos', 'Apellidos');?></th>
		<th><?php echo $this -> Paginator -> sort('direccion', 'Sexo');?></th>
		<th><?php echo $this -> Paginator -> sort('Canton.can_nombre', 'Fec. nacimiento');?></th>
		<th><?php echo $this -> Paginator -> sort('Ciudad.ciudad_nombre', 'Tip. sangre');?></th>
		<th><?php echo $this -> Paginator -> sort('Parroquia.par_nombre', 'Estado civil');?></th>
		<th><?php echo $this -> Paginator -> sort('direccion', 'Grado estudio');?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha creación');?></th>
	</tr>
	<?php
//debug($reporteIngresos);
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
<div class="paging">
	
	<?php
	echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> numbers(array('separator' => ''));
	echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	echo $this -> Paginator -> last('>> ', array(), null, array('class' => 'next disabled'));
	?>
</div>
<a class='button' href="/centrosArtesanales/reporte">Volver</a>
&nbsp; <a class='button' href="/centrosArtesanales/impReporte">Descargar pdf</a>
&nbsp; <a class='button' href="/centrosArtesanales/export_csv">Exportar a CSV</a>
<?php }?>


