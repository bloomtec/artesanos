<div class="personas form">
<?php echo $this->Form->create('Persona');?>
	<fieldset>
		<h2><?php echo __('Agregar Persona'); ?></h2>
	<?php
		echo $this->Form->input('per_nombres',array('label'=>'Nombres'));
		echo $this->Form->input('per_apellidos',array('label'=>'Apellidos'));
		echo $this->Form->input('per_cedula_de_identidad',array('label'=>'Cedula_de_identidad'));
		echo $this->Form->input('per_departamento',array('label'=>'Departamento'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>