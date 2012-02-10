<div class="balances form">
<?php echo $this->Form->create('Balance');?>
	<fieldset>
		<h2><?php echo __('Modificar Balance'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('calificacion_id');
		echo $this->Form->input('bal_domicilio_propio');
		echo $this->Form->input('bal_domicilio_valor');
		echo $this->Form->input('bal_taller_propio');
		echo $this->Form->input('bal_taller_valor');
		echo $this->Form->input('bal_agua');
		echo $this->Form->input('bal_luz');
		echo $this->Form->input('bal_telefono');
		echo $this->Form->input('bal_servicios_basicos');
		echo $this->Form->input('bal_compras_de_materia_prima_mensuales');
		echo $this->Form->input('bal_salario_operarios');
		echo $this->Form->input('bal_salario_aprendices');
		echo $this->Form->input('bal_otros_salarios');
		echo $this->Form->input('bal_maquinas_y_herramientas');
		echo $this->Form->input('bal_materia_prima');
		echo $this->Form->input('bal_elaborados');
		echo $this->Form->input('bal_ingresos_por_ventas');
		echo $this->Form->input('bal_otros_ingresos');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>