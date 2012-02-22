<div class="feriados form">
<?php echo $this->Form->create('Feriado');?>
	<fieldset>
		<h2><?php echo __('Agregar Feriado'); ?></h2>
	<?php
		echo $this->Form->input('fer_nombre', array('label' => 'Nombre'));
		echo $this->Form->input('fer_fecha', array('label' => 'Fecha'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>