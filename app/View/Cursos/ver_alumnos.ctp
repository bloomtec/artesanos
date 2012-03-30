<div class='alumnos view verAlumnos'>
	<table>
	  <tr>
	  	<th>Numero de documento</th>
	  	<th>Apellidos</th>
	  	<th>Nombres</th>
	  	<th>Asistecias</th>
	  	<th>Calificacion</th>
	  	<th clas='action'> Acciones </th>
	  </tr>
	  <?php foreach($alumnos as $alumno): ?>
	  <tr>
	  	<td>
	  		<?php echo $alumno['Alumno']['alu_documento_de_identificacion']; ?>	
	  	</td>
	  	<td>
	  		<?php echo $alumno['Alumno']['alu_apellido_materno']." ".$alumno['Alumno']['alu_apellido_materno']; ?>		
	  	</td>
	  	<td>
	  		<?php echo $alumno['Alumno']['alu_nombres']; ?>	
	  	</td>
	  	<td>
	  		<?php echo $alumno['CursosAlumno']['cur_asistencias']; ?>		
	  	</td>
	  	<td>
	  		<?php echo $alumno['CursosAlumno']['cur_nota_final']; ?>		
	  	</td>
	  	<td class="actions">
	  		<?php  if($alumno['CursosAlumno']['cur_aprobo']) echo $this -> Html -> link('certificado',array("action"=>'certificado',$alumno['CursosAlumno']['id']),array('class'=>'certificado','title'=>'Descargar certificado	'));?>
	  		<?php if($alumno['Curso']['cur_activo']) echo  $this -> Html -> link('certificado',array("action"=>'quitarAlumno',$alumno['CursosAlumno']['id']),array('class'=>'delete','title'=>'Quitar Alumno'));  ?>
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