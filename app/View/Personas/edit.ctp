<div class="personas form">
	<?php echo $this -> Form -> create('Persona');?>
	<fieldset>
		<h2><?php echo __('Modificar Persona');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('per_nombres', array('label' => 'Nombres'));
		echo $this -> Form -> input('per_apellidos', array('label' => 'Apellidos'));
		echo $this -> Form -> input('per_is_cedula', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('1'=>'Cédula: ','0'=>'Pasaporte: ')));	
		
		echo $this -> Form -> input('per_documento_de_identidad', array('label' => false,"style"=>"margin-top:5px","class"=>"number"));
		echo $this -> Form -> input('per_departamento', array('label' => 'Departamento', 'type' => 'select', 'options' => $departamentos));
		
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>