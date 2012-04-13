<div class="cursos form form2">
	<?php echo $this -> Form -> create('Curso');?>
	<?php //debug($this -> data);?>
	<fieldset>
		<h2><?php echo __('Administrar Curso');?></h2>
		
		<?php
		echo $this -> Form -> input('id');
		//echo $this -> Form -> input('solicitud_id');
		echo $this -> Form -> input('instructor_id',array('empty'=>'Seleccione...'));
		echo $this -> Form -> input('cur_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('cur_contenido', array('label' => 'Contenido'));
		echo $this -> Form -> input('cur_fecha_de_inicio', array('label' => 'Fecha De Inicio', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_fecha_de_fin', array('label' => 'Fecha De Fin', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_costo', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		
		
		echo $this -> Form -> input('cur_numero_horas', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		echo $this -> Form -> input('cur_horario_inicio', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		echo $this -> Form -> input('cur_horario_fin', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		
		echo $this -> Form -> input('provincia_id', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		echo $this -> Form -> input('canton_id', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		echo $this -> Form -> input('ciudad_id', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		echo $this -> Form -> input('parroquia_id', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		
		
		echo $this -> Form -> input('cur_direccion', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));
		
	
		?>
	</fieldset>
	<fieldset>
		<h2><?php echo __('Registro de alumnos');?></h2>
		<?php
		//debug($losAlumnos);
		echo $this -> element('registro_de_alumnos', array('alumnos' => $losAlumnos));
		//echo $this -> Form -> input('Alumno', array('label' => 'Alumnos'));
		?>
	</fieldset>
	<div style="clear:both;">
		<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
		<?php echo $this -> Form -> end(__('Guardar'));?>
	</div>
</div>