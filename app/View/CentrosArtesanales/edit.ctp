<div class="centrosArtesanales form">
<?php echo $this->Form->create('CentrosArtesanal');?>
	<fieldset>
		<h2><?php echo __('Modificar Centros Artesanal'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cen_ruc',array('label'=>'Ruc'));
		echo $this->Form->input('cen_nombre',array('label'=>'Nombre'));
		echo $this->Form->input('provincia_id');
		echo $this->Form->input('canton_id');
		echo $this->Form->input('ciudad_id');
		echo $this->Form->input('parroquia_id');
		echo $this->Form->input('direccion',array('label'=>'Ccion'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>