<?php echo $this -> Html -> script('usuarios-edit'); ?>
<div class="usuarios form">
	<?php echo $this -> Form -> create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Cambiar Contraseña');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> hidden('usu_nombre_de_usuario');
		echo $this -> Form -> input('usu_nombre_de_usuario', array('label' => 'Nombre De Usuario','disabled'=>true));
		echo $this -> Form -> input('usu_contrasena', array('value' => '', 'label' => 'Nueva Contraseña', 'type' => 'password', 'value' => ''));
		echo $this -> Form -> input('usu_contrasena_confirmar', array('value' => '', 'label' => 'Confirmar Contraseña', 'type' => 'password'));
		echo $this -> Form -> hidden('rol_id');
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar button'));?>
	<?php echo $this -> Form -> end(__('Guardar')); ?>
</div>