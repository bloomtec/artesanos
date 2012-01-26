<div class="ciudades form">
<?php echo $this->Form->create('Ciudad');?>
	<fieldset>
		<h2><?php echo __('Agregar Ciudad'); ?></h2>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>