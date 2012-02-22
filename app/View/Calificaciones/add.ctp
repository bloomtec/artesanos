<div class="calificaciones form">
<?php echo $this->Form->create('Calificacion');?>
	<fieldset>
		<h2><?php echo __('Agregar Calificacion'); ?></h2>
	<?php
		echo $this->Form->input('rama_id');
		echo $this->Form->input('artesano_id');
		echo $this->Form->input('tipos_de_calificacion_id');
		echo $this->Form->input('cal_estado');
		echo $this->Form->input('cal_inspector_local');
		echo $this->Form->input('cal_fecha_inspeccion_local');
		echo $this->Form->input('cal_inspector_taller');
		echo $this->Form->input('cal_fecha_inspeccion_taller');
		echo $this->Form->input('cal_fecha_expiracion');
		echo $this->Form->input('cal_domicilio_propio');
		echo $this->Form->input('cal_domicilio_valor');
		echo $this->Form->input('cal_taller_propio');
		echo $this->Form->input('cal_taller_valor');
		echo $this->Form->input('cal_agua');
		echo $this->Form->input('cal_luz');
		echo $this->Form->input('cal_telefono');
		echo $this->Form->input('cal_servicios_basicos');
		echo $this->Form->input('cal_compra_de_materia_prima_mensual');
		echo $this->Form->input('cal_salario_operarios');
		echo $this->Form->input('cal_salario_aprendices');
		echo $this->Form->input('cal_otros_salarios');
		echo $this->Form->input('cal_maquinas_y_herramientas');
		echo $this->Form->input('cal_materia_prima');
		echo $this->Form->input('cal_productos_elaborados');
		echo $this->Form->input('cal_ingresos_por_ventas');
		echo $this->Form->input('cal_otros_ingresos');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>