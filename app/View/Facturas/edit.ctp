<div class="facturas form">
<?php echo $this->Form->create('Factura');?>
	<fieldset>
		<h2><?php echo __('Modificar Factura'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fac_numero',array('label'=>'Numero'));
		echo $this->Form->input('fac_comprobante_deposito',array('label'=>'Comprobante Deposito'));
		echo $this->Form->input('fac_cliente',array('label'=>'Cliente'));
		echo $this->Form->input('provincia_id');
		echo $this->Form->input('canton_id');
		echo $this->Form->input('ciudad_id');
		echo $this->Form->input('fac_direccion',array('label'=>'Direccion'));
		echo $this->Form->input('fac_telefono',array('label'=>'Telefono'));
		echo $this->Form->input('fac_ruc_doc',array('label'=>'Ruc Doc'));
		echo $this->Form->input('fac_fecha_emision',array('label'=>'Fecha Emision'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>