<div class="aprendices form">
<?php echo $this->Form->create('Aprendiz');?>
	<fieldset>
		<h2><?php echo __('Agregar Aprendiz'); ?></h2>
	<?php
		echo $this->Form->input('taller_id');
		echo $this->Form->input('apr_cedula');
		echo $this->Form->input('apr_nombres_y_apellidos');
		echo $this->Form->input('apr_sexo');
		echo $this->Form->input('apr_fecha_ingreso');
		echo $this->Form->input('apr_afiliado_seguro');
		echo $this->Form->input('apr_fecha_nacimiento');
		echo $this->Form->input('apr_pago_mensual');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>