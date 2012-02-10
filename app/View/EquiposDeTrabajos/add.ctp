<div class="equiposDeTrabajos form">
<?php echo $this->Form->create('EquiposDeTrabajo');?>
	<fieldset>
		<h2><?php echo __('Agregar Equipos De Trabajo'); ?></h2>
	<?php
		echo $this->Form->input('taller_id');
		echo $this->Form->input('equ_cantidad');
		echo $this->Form->input('equ_maquinaria_y_herramientas');
		echo $this->Form->input('equ_tipo_de_adquisicion');
		echo $this->Form->input('equ_fecha_de_adquisicion');
		echo $this->Form->input('equ_valor_comercial');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>