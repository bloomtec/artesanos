<div class="datosPersonales form">
<?php echo $this->Form->create('DatosPersonal');?>
	<fieldset>
		<h2><?php echo __('Agregar Datos Personal'); ?></h2>
	<?php
		echo $this->Form->input('calificacion_id');
		echo $this->Form->input('dat_apellido_paterno');
		echo $this->Form->input('dat_apellido_materno');
		echo $this->Form->input('dat_nombres');
		echo $this->Form->input('dat_nacionalidad');
		echo $this->Form->input('dat_fecha_nacimiento');
		echo $this->Form->input('dat_estado_civil');
		echo $this->Form->input('dat_grado_estudio');
		echo $this->Form->input('dat_sexo');
		echo $this->Form->input('dat_hijos_mayores');
		echo $this->Form->input('dat_hijos_menores');
		echo $this->Form->input('dat_tipo_discapacidad');
		echo $this->Form->input('dat_porcentaje_de_discapacidad');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>