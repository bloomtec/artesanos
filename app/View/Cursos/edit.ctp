<div class="cursos form form2">
	<?php echo $this -> Form -> create('Curso');?>
	<fieldset>
		<h2><?php echo __('Administrar Curso');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('solicitud_id');
		echo $this -> Form -> input('instructor_id');
		echo $this -> Form -> input('cur_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('cur_descripcion', array('label' => 'Descripcion'));
		echo $this -> Form -> input('cur_fecha_de_inicio', array('label' => 'Fecha De Inicio', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_fecha_de_fin', array('label' => 'Fecha De Fin', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_costo', array('label' => 'Costo','class'=>'costo','type'=>'text'));
		$alumnos['Alumno']=$this -> data['Alumno'];
		?>
	</fieldset>
	<fieldset>
		<h2><?php echo __('Registro de alumnos');?></h2>
		<?php 
		echo $this -> element('registro_de_alumnos',array('alumnos'=>$alumnos));
		//echo $this -> Form -> input('Alumno', array('label' => 'Alumnos'));
		?>
	</fieldset>
	<div style="clear:both;">
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
	</div>
</div>