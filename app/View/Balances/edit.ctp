<div class="balances form">
<?php echo $this->Form->create('Balance');?>
	<fieldset>
		<h2><?php echo __('Modificar Balance'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('domicilio_propio');
		echo $this->Form->input('domicilio_valor');
		echo $this->Form->input('taller_propio');
		echo $this->Form->input('taller_valor');
		echo $this->Form->input('servicios_basicos');
		echo $this->Form->input('salario_operarios');
		echo $this->Form->input('salario_aprendices');
		echo $this->Form->input('total_egresos');
		echo $this->Form->input('maquinaria_y_herramientas');
		echo $this->Form->input('materia_prima');
		echo $this->Form->input('elaborados');
		echo $this->Form->input('otros_ingresos');
		echo $this->Form->input('total_ingresos');
		echo $this->Form->input('rentabilidad_mensual');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('local_id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>