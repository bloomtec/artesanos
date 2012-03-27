<div class="ventasEspecies form">
<?php echo $this->Form->create('VentasEspecie');?>
	<fieldset>
		<h2><?php echo __('Agregar Ventas Especie'); ?></h2>
	<?php
		echo $this->Form->input('juntas_provincial_id');
		echo $this->Form->input('artesano_id');
		echo $this->Form->input('ven_serie_inicial',array('label'=>'Serie Inicial'));
		echo $this->Form->input('ven_serie_final',array('label'=>'Serie Final'));
		echo $this->Form->input('ven_cantidad_total',array('label'=>'Cantidad Total'));
		echo $this->Form->input('ven_valor_total',array('label'=>'Valor Total'));
		echo $this->Form->input('EspeciesValorada',array('label'=>'Ted'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>