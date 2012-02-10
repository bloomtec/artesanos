<div class="operadores form">
<?php echo $this->Form->create('Operador');?>
	<fieldset>
		<h2><?php echo __('Modificar Operador'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('ope_cedula');
		echo $this->Form->input('ope_nombres_y_apellidos');
		echo $this->Form->input('ope_sexo');
		echo $this->Form->input('ope_fecha_ingreso');
		echo $this->Form->input('ope_afiliado_seguro');
		echo $this->Form->input('ope_fecha_nacimiento');
		echo $this->Form->input('ope_pago_mensual');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>