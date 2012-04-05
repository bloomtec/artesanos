<style>
	.ingresoCalificaciones td .input input {
		width: 100px;
	}
	form {
		width: 100%;
	}
	form .input.checkbox {
		margin-bottom: 5px;
	}
	p {
		margin-bottom: 10px;
	}
	form .input.checkbox label {
		width: 100px;
	}
</style>
<div class="form alumnos ingresoCalificaciones">
	<?php echo $this -> Form -> create('Alumno');?>
	<table  id="registroAlumnos" show="10" till="200" style="width:950px">
		<tr>
			<th>Documento de identidad</th>
			<th>Apellidos</th>
			<th>Nombre completo</th>
			<th>Calificacion</th>
			<th>Asistencia</th>
		</tr>
		<?php $i=0;foreach($alumnos as $alumno):
		?>
		<tr>
			<td><span> <?php echo $alumno['Alumno']['alu_documento_de_identificacion'];?></span></td>
			<td><?php  echo $alumno['Alumno']['alu_apellido_paterno']." ".$alumno['Alumno']['alu_apellido_materno']
			?></td>
			<td><?php  echo $alumno['Alumno']['alu_nombres'];?></td>
			<td><?php echo $this -> Form -> input('CursosAlumno.' . $i . '.id', array('value' => $alumno['CursosAlumno']['id']));?>
			<?php echo $this -> Form -> input('CursosAlumno.' . $i . '.cur_nota_final', array('value' => $alumno['CursosAlumno']['cur_nota_final']*100, 'class' => 'calificacion valor', 'type' => 'text', 'label' => false, 'maximo' => $calificacionMaxima));?></td>
			<td><?php echo $this -> Form -> input('CursosAlumno.' . $i . '.cur_asistencias', array('value' => $alumno['CursosAlumno']['cur_asistencias'], 'class' => 'number', 'type' => 'text', 'label' => false));?></td>
		</tr>
		<?php
		$i++;
		endforeach;
		?>
	</table>
	<?php echo $this -> Form -> input('Curso.cur_activo', array('label' => false, 'before' => '<label for="CursoCurActivo">Cerrar Curso</label>', 'style' => 'width:40px;'));?>
	<p style='text-align:left;'>
		Debe cerrar el curso para que se puedan imprimir los certificados, una vez se cierre no se podrán modificar las notas
	</p>
	<?php echo $this -> Form -> end('Guardar')
	?>
</div>
<div class="actions">
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Volver Cursos'), array('action' => 'index'));?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('Modificar Curso'), array('action' => 'edit', $curso['Curso']['id']));?>
		</li>
	</ul>
</div>
<script type="text/javascript">
	$(function() {
		var notaMaxima=parseFloat(<?php echo $calificacionMaxima; ?>);
		$('form').submit(function(e) {
			
			var nota=errors=0;
			$.each($('.calificacion'), function(i, val) {
				nota=parseFloat(BJS.formatNumber($(val).val().replace(/[.]/g,'').replace(',','.')));
				if(nota > notaMaxima){
					e.preventDefault();
					errors++;
				}
				if(errors){
					alert('Existen notas que son mayores a la calificación máxima permitida (<?php  echo $calificacionMaxima ?>), por favor verifique');	
				}
			});
		});
	});

</script>
