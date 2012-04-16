<!-- Reporte de Alumnos por provincia,  fecha ingreso
en el momento la tabla alumno no tiene provincia, entonces hay que agregarsela -->
<?php if($reporte==false) {
?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte', array("Action"=>"reporte"));?>
	<h2>
		<h2><?php echo __('Reporte alumnos en cursos por provincia y fecha de creación'); ?></h2>
	</h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('provincia', array('type' => 'select', 'label' => 'Provincias', 'empty' => 'Seleccione...', 'options' => $provincias));
		echo $this -> Form -> input('fecha_creacion', array('value' => '', 'type' => 'text', 'label' => 'Fecha ingreso', 'class' => 'date'));
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
<h2><?php echo __('Reporte alumnos en cursos por provincia y fecha de creación'); ?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('alu_documento_de_identificaicion', 'Doc. identificación');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_nacionalidad', 'Nacionalidad');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_nombres', 'Nombres');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_apellido_paterno', 'Apellidos');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_sexo', 'Sexo');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_fecha_de_nacimiento', 'Fec. nacimiento');?></th>
		<th><?php echo $this -> Paginator -> sort('[alu_tipo_de_sangre', 'Tip. sangre');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_estado_civil', 'Estado civil');?></th>
		<th><?php echo $this -> Paginator -> sort('alu_grado_de_estudio', 'Grado estudio');?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha creación');?></th>
	</tr>
	<?php
//debug($reporteIngresos);
for($i=0;$i < count($reporteAlumnos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_documento_de_identificacion"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_nacionalidad"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_nombres"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_apellido_paterno"].' '.$reporteAlumnos[$i]["Alumno"]["alu_apellido_materno"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_sexo"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_fecha_de_nacimiento"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_tipo_de_sangre"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_estado_civil"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["alu_grado_de_estudio"]; ?></td>
		<td><?php echo $reporteAlumnos[$i]["Alumno"]["created"]; ?></td>
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
<a class='button' href="/alumnos/reporte">Volver</a>
&nbsp; <a class='button' href="/alumnos/impReporte">Descargar pdf</a>
&nbsp; <a class='button' href="/alumnos/export_csv">Exportar a CSV</a>
<?php }?>


