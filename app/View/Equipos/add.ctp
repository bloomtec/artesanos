<div class="equipos form">
<?php echo $this->Form->create('Equipo');?>
	<fieldset>
		<h2><?php echo __('Agregar Equipo'); ?></h2>
	<?php
		echo $this->Form->input('cantidad');
		echo $this->Form->input('maquinaria_y_herramientas');
		echo $this->Form->input('tipo_de_adquisicion');
		echo $this->Form->input('fecha_de_adquisicion');
		echo $this->Form->input('valor_comercial');
		echo $this->Form->input('local_id');
		echo $this->Form->input('taller_id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>