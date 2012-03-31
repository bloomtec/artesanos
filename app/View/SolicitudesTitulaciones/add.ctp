<div class="solicitudesTitulaciones form">
<?php echo $this->Form->create('SolicitudesTitulacion');?>
	<fieldset>
		<h2><?php echo __('Agregar Solicitudes Titulacion'); ?></h2>
	<?php
		echo $this->Form->input('estados_solicitudes_titulacion_id');
		echo $this->Form->input('titulo_id');
		echo $this->Form->input('tipos_solicitudes_titulacion_id');
		echo $this->Form->input('artesano_id');
		echo $this->Form->input('sol_mensaje',array('label'=>'Mensaje'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>