<div class="artesanos form">
<?php echo $this->Form->create('Artesano');?>
	<fieldset>
		<h2><?php echo __('Agregar Artesano'); ?></h2>
	<?php
		echo $this->Form->input('apellido_paterno');
		echo $this->Form->input('apellido_materno');
		echo $this->Form->input('nombres');
		echo $this->Form->input('nacionalidad');
		echo $this->Form->input('cedula_de_ciudadania');
		echo $this->Form->input('fecha_de_nacimiento');
		echo $this->Form->input('tipo_de_sangre');
		echo $this->Form->input('estado_civil');
		echo $this->Form->input('edad');
		echo $this->Form->input('grado_de_estudio');
		echo $this->Form->input('sexo');
		echo $this->Form->input('hijos_mayores');
		echo $this->Form->input('hijos_menores');
		echo $this->Form->input('tipo_de_discapacidad');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>