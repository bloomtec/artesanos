<!-- Reporte por provincia, fecha de creación. -->
<?php if($reporte==false) {
?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2>
		<?php echo __('Reporte centros artesanales'); ?>
	</h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('provincia_id', array('type' => 'select', 'label' => 'Provincia'));
		echo $this -> Form -> input('canton_id', array('type' => 'select', 'label' => 'Canton', 'empty' => 'Seleccione...', 'options' => ''));
		echo $this -> Form -> input('ciudad_id', array('type' => 'select', 'label' => 'Ciudad', 'empty' => 'Seleccione...', 'options' => ''));
		echo $this -> Form -> input('parroquia_id', array('type' => 'select', 'label' => 'Parroquia', 'empty' => 'Seleccione...', 'options' => ''));
		echo $this -> Form -> input('rama_id', array('type' => 'select', 'label' => 'Rama', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('cen_tipo', array('type' => 'select', 'options' => $tipos, 'label' => 'Tipo', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('cen_sostenimiento', array('type' => 'select', 'options' => $sostenimientos, 'label' => 'Sostenimiento', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('cen_modalidad', array('type' => 'select', 'options' => $modalidades, 'label' => 'Modalidad', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('cen_lenguaje', array('type' => 'select', 'options' => $lenguajes, 'label' => 'Lenguaje', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('fecha_creacion', array('value' => '', 'type' => 'text', 'label' => 'Fecha De Creación', 'class' => 'date'));
		echo $this -> Form -> input('fecha1', array('value' => '', 'type' => 'text', 'label' => 'Fecha Inicio Periodo', 'class' => 'date', 'value'=>$fechaActual));
		echo $this -> Form -> input('fecha2', array('value' => '', 'type' => 'text', 'label' => 'Fecha Final Periodo', 'class' => 'date', 'value'=>$fechaActual));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>
<?php } else {  /*debug($reporteIngresos);*/?>
<br />
<br />
<h2><?php echo __('Reporte centros artesanales');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('cen_ruc', 'RUC');?></th>
		<th><?php echo $this -> Paginator -> sort('cen_nombre', 'Nombre');?></th>
		<th><?php echo $this -> Paginator -> sort('Provincia.pro_nombre', 'Provincia');?></th>
		<th><?php echo $this -> Paginator -> sort('Canton.can_nombre', 'Canton');?></th>
		<th><?php echo $this -> Paginator -> sort('Ciudad.ciudad_nombre', 'Ciudad');?></th>
		<th><?php echo $this -> Paginator -> sort('Parroquia.par_nombre', 'Parroquia');?></th>
		<th><?php echo $this -> Paginator -> sort('direccion', 'Dirección');?></th>
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

<script type="text/javascript">
	$(function() {
		var actualizarCiudades = function() {
			BJS.updateSelect($("#ReporteCantonId"), "/cantones/getByProvincia/" + $("#ReporteProvinciaId option:selected").val(), function() {
				BJS.updateSelect($("#ReporteCiudadId"), "/ciudades/getByCanton/" + $("#ReporteCantonId option:selected").val(), function() {
					BJS.updateSelect($("#ReporteParroquiaId"), "/parroquias/getByCiudad/" + $("#ReporteCiudadId option:selected").val());
				});
			});
		}
		$('#ReporteProvinciaId').change(function() {
			actualizarCiudades();
		});
		$('#ReporteCantonId').change(function() {
			BJS.updateSelect($("#ReporteCiudadId"), "/ciudades/getByCanton/" + $("#ReporteCantonId option:selected").val(), function() {
				BJS.updateSelect($("#ReporteParroquiaId"), "/parroquias/getByCiudad/" + $("#ReporteCiudadId option:selected").val());
			});
		});
		$('#ReporteCiudadId').change(function() {
			BJS.updateSelect($("#ReporteParroquiaId"), "/parroquias/getByCiudad/" + $("#ReporteCiudadId option:selected").val());
		});
		actualizarCiudades();
	});
</script>