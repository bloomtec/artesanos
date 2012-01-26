<div class="usuarios form">
<?php echo $this->Form->create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Modificar Usuario'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('usuario');
		echo $this->Form->input('contrasena');
		echo $this->Form->input('ciudad_id');
		echo $this->Form->input('ubicacion_id');
		echo $this->Form->input('sector_id');
		echo $this->Form->input('rol_id');
		echo $this->Form->input('con_acceso');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>