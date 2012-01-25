<div class="productos form">
<?php echo $this->Form->create('Producto');?>
	<fieldset>
		<h2><?php echo __('Agregar Producto'); ?></h2>
	<?php
		echo $this->Form->input('cantidad');
		echo $this->Form->input('detalle');
		echo $this->Form->input('procedencia');
		echo $this->Form->input('valor_comercial');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('local_id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>