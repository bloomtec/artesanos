<div class="solicitudes form">
<?php echo $this->Form->create('Solicitud');?>
	<fieldset>
		<h2><?php echo __('Modificar Solicitud'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('juntas_provincial_id');
		echo $this->Form->input('sol_fecha_solicitud',array('label'=>'Fecha Solicitud'));
		echo $this->Form->input('sol_numero_de_memorandum',array('label'=>'Numero De Memorandum'));
		echo $this->Form->input('sol_nombre_de_la_capacitacion',array('label'=>'Nombre De La Capacitacion'));
		echo $this->Form->input('sol_duracion',array('label'=>'Duracion'));
		echo $this->Form->input('sol_fecha_inicio_de_la_capacitacion',array('label'=>'Fecha Inicio De La Capacitacion'));
		echo $this->Form->input('sol_fecha_de_fin_de_la_capacitacion',array('label'=>'Fecha De Fin De La Capacitacion'));
		echo $this->Form->input('sol_costos',array('label'=>'Costos'));
		echo $this->Form->input('sol_numero_de_participantes',array('label'=>'Numero De Participantes'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>