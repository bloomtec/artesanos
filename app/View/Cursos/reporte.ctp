<!-- Reporte de Cursos de capacitación por provincia, ciudad, fecha, estado.
∘ devuelve el curso y cuantos alumnos tiene registrado el curso (virtual field) -->
<?php if($reporte==false) {
?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte', array("Action"=>"reporte"));?>
	<h2>
		<?php echo __('Reporte cursos'); ?>
	</h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('provincia_id', array('type' => 'select', 'label' => 'Provincia'));
		echo $this -> Form -> input('canton_id', array('type' => 'select', 'label' => 'Canton', 'empty' => 'Seleccione...', 'options' => ''));
		echo $this -> Form -> input('ciudad_id', array('type' => 'select', 'label' => 'Ciudad', 'empty' => 'Seleccione...', 'options' => ''));
		echo $this -> Form -> input('estado', array('type' => 'select', 'label' => 'Estado', 'empty' => 'Seleccione...', 'options' => array(1=>"Activo",2=>"No activo")));
		echo $this -> Form -> input('fecha_creacion', array('value' => '', 'type' => 'text', 'label' => 'Fecha creación', 'class' => 'date'));
		echo $this -> Form -> input('fecha1', array('value' => '', 'type' => 'text', 'label' => 'Fecha De Inicio', 'class' => 'date'));
		echo $this -> Form -> input('fecha2', array('value' => '', 'type' => 'text', 'label' => 'Fecha De Fin', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>
<?php } else {  /*debug($reporteIngresos);*/?>
<br />
<br />
<h2><?php echo __('Reporte cursos');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('Solicitud.id', 'Solicitud');?></th>
		<th><?php echo $this -> Paginator -> sort('cur_nombre', 'Nombre');?></th>
		<th><?php echo $this -> Paginator -> sort('cur_contenido', 'Contenido');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_sexo', 'Fecha inicio');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_fecha_de_nacimiento', 'Fecha fin');?></th>
		<th><?php echo $this -> Paginator -> sort('[alu_tipo_de_sangre', 'Jornada');?></th>
		<th><?php echo $this -> Paginator -> sort('', 'Num. horas');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_grado_de_estudio', 'Hora inicio');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_grado_de_estudio', 'Hora fin');?></th>
		<th><?php echo $this -> Paginator -> sort('Provincia.pro_nombre', 'Provincia');?></th>
		<th>Num. Alumnos</th>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha creación');?></th>
	</tr>
	<?php
//debug($reporteIngresos);
for($i=0;$i < count($reporteCursos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteCursos[$i]["Solicitud"]["id"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_nombre"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_contenido"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_fecha_de_inicio"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_fecha_de_fin"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_jornada"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_numero_horas"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_horario_inicio"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["cur_horario_fin"]; ?></td>
		<td><?php echo $reporteCursos[$i]["Provincia"]["pro_nombre"]; ?></td>
		<td><?php echo $numAlumnos[$i]; ?></td>
		<td><?php echo $reporteCursos[$i]["Curso"]["created"]; ?></td>
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
<a class='button' href="/cursos/reporte">Volver</a>
&nbsp; <a class='button' href="/cursos/impReporte">Descargar pdf</a>
&nbsp; <a class='button' href="/cursos/export_csv">Exportar a CSV</a>
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
		actualizarCiudades();
	});
</script>