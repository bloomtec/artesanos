<div class="cursos form">
	<?php echo $this -> Form -> create('Curso', array('type' => 'file'));?>
	<fieldset>
		<h2><?php echo __('Agregar Curso');?></h2>
		<?php
		echo $this -> Form -> input('solicitud_id', array('empty' => 'Seleccione...'));
		echo $this -> Form -> input('instructor_id', array('empty' => 'Seleccione...'));
		echo $this -> Form -> input('cur_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('cur_contenido', array('label' => 'Descripción'));
		echo $this -> Form -> input('cur_fecha_de_inicio', array('label' => 'Fecha De Inicio', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_fecha_de_fin', array('label' => 'Fecha De Fin', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_costo', array('label' => 'Costo', 'type' => 'text', 'class' => 'valor'));
		echo $this -> Form -> input('Alumno', array('label' => 'Alumnos'));
		?>
	</fieldset>
	<fieldset>
		<h2><?php echo __('Documentos');?></h2>
		<?php
		echo $this -> Form -> input('Documentos.doc_1', array('label' => 'Documento 1', 'type' => 'file'));
		echo $this -> Form -> input('Documentos.doc_2', array('label' => 'Documento 2', 'type' => 'file'));
		echo $this -> Form -> input('Documentos.doc_3', array('label' => 'Documento 3', 'type' => 'file'));
		echo $this -> Form -> input('Documentos.doc_4', array('label' => 'Documento 4', 'type' => 'file'));
		echo $this -> Form -> input('Documentos.doc_5', array('label' => 'Documento 5', 'type' => 'file'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>