<div class="ingresosEspecies form">
<?php echo $this->Form->create('IngresosEspecie');?>
	<fieldset>
		<h2><?php echo __('Modificar Ingresos Especie'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ing_fecha',array('label'=>'Fecha'));
		echo $this->Form->input('ing_cantidad_total',array('label'=>'Cantidad Total'));
		echo $this->Form->input('EspeciesValorada',array('label'=>'Fied'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>