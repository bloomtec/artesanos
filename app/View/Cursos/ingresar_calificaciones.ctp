<?php echo $this -> Form -> create('Alumno');?>
<div class="form alumnos ingresoCalificaciones">
	
	<table  id="registroAlumnos" show="10" till="200">
		<tr>
			<th>Documento de identidad</th>
			<th>Nombre completo</th>
			<th>Calificacion</th>
		</tr>
		<?php foreach($alumnos as $alumno):?>
		<tr>
			<td>
				<span> <?php echo $alumno['Alumno']['alu_documento_de_identificacion']; ?> </span>
			</td>
			<td>
				<?php  echo $alumno['Alumno']['alu_nombres']." ".$alumno['Alumno']['alu_apellido_paterno']." ".$alumno['Alumno']['alu_apellido_materno']?>
			</td>
			<td>
				<?php echo $this -> Form ->input('CursosAlumno.id',array('value'=>$alumno['CursosAlumno']['id'])); ?>
				<?php echo $this -> Form ->input('CursosAlumno.id',array('value'=>$alumno['CursosAlumno']['cur_nota_final'])); ?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
	
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Cursos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Curso'), array('action' => 'edit', $curso['Curso']['id'])); ?> </li>
	</ul>
</div>
<?php echo $this -> Form -> end()?>