<div class="usuarios form">
<?php echo $this->Form->create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Agregar Usuario'); ?></h2>
	<?php
		echo $this->Form->input('usuario');
		echo $this->Form->input('contraseņa');
		echo $this->Form->input('ciudad_id');
		echo $this->Form->input('ubicacion_id');
		echo $this->Form->input('sector_id');
		echo $this->Form->input('rol_id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>