<div class="calificaciones form">
<?php echo $this->Form->create('Calificacion');?>
	<fieldset>
		<h2><?php echo __('Modificar Calificacion'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rama_id');
		echo $this->Form->input('artesano_id');
		echo $this->Form->input('cal_inspector_encargado');
		echo $this->Form->input('cal_fecha_inspeccion');
		echo $this->Form->input('cal_fecha_expiracion');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>