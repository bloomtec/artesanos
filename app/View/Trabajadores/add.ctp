<div class="trabajadores form">
<?php echo $this->Form->create('Trabajador');?>
	<fieldset>
		<h2><?php echo __('Agregar Trabajador'); ?></h2>
	<?php
		echo $this->Form->input('tipos_de_trabajador_id');
		echo $this->Form->input('tra_cedula');
		echo $this->Form->input('tra_nombres_y_apellidos');
		echo $this->Form->input('tra_sexo');
		echo $this->Form->input('tra_fecha_ingreso');
		echo $this->Form->input('tra_afiliado_seguro');
		echo $this->Form->input('tra_fecha_nacimiento');
		echo $this->Form->input('tra_pago_mensual');
		echo $this->Form->input('Taller');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>