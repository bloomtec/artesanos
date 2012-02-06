<div class="usuarios form">
<?php echo $this->Form->create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Agregar Usuario'); ?></h2>
	<?php
		echo $this->Form->input('rol_id', array('label' => 'Rol'));
		echo $this->Form->input('usu_nombre_de_usuario', array('label' => 'Nombre De Usuario'));
		echo $this->Form->input('usu_contrasena', array('label' => 'Contraseña', 'type' => 'password'));
		echo $this->Form->input('usu_cedula', array('label' => 'Cédula'));
		echo $this->Form->input('usu_nombres_y_apellidos', array('label' => 'Nombres Y Apellidos'));
		echo $this->Form->input('usu_activo', array('label' => 'Activo', 'checked'=>'checked'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>