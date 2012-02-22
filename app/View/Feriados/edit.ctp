<div class="feriados form">
<?php echo $this->Form->create('Feriado');?>
	<fieldset>
		<h2><?php echo __('Modificar Feriado'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fer_nombre');
		echo $this->Form->input('fer_fecha');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>