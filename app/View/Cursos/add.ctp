<div class="cursos form">
	<?php echo $this -> Form -> create('Curso');?>
	<fieldset>
		<h2><?php echo __('Agregar Curso');?></h2>
		<?php
		echo $this -> Form -> input('solicitud_id', array('empty' => 'Seleccione...'));
		echo $this -> Form -> input('instructor_id', array('empty' => 'Seleccione...'));
		echo $this -> Form -> input('cur_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('cur_descripcion', array('label' => 'Descripción'));
		echo $this -> Form -> input('cur_fecha_de_inicio', array('label' => 'Fecha De Inicio', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_fecha_de_fin', array('label' => 'Fecha De Fin', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_costo', array('label' => 'Costo', 'type' => 'text', 'class' => 'valor'));
		echo $this -> Form -> input('Alumno', array('label' => 'Alumnos'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>