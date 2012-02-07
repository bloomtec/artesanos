<div class="productosElaborados form">
<?php echo $this->Form->create('ProductosElaborado');?>
	<fieldset>
		<h2><?php echo __('Modificar Productos Elaborado'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('pro_cantidad');
		echo $this->Form->input('pro_detalle');
		echo $this->Form->input('pro_procedencia');
		echo $this->Form->input('pro_valor_comercial');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>