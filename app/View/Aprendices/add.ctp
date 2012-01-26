<div class="aprendices form">
<?php echo $this->Form->create('Aprendiz');?>
	<fieldset>
		<h2><?php echo __('Agregar Aprendiz'); ?></h2>
	<?php
		echo $this->Form->input('operario');
		echo $this->Form->input('cedula');
		echo $this->Form->input('fecha_de_ingreso');
		echo $this->Form->input('afiliado_seguro');
		echo $this->Form->input('edad');
		echo $this->Form->input('pago_mensual');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('local_id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>