<div class="proveedores form">
<?php echo $this->Form->create('Proveedor');?>
	<fieldset>
		<h2><?php echo __('Modificar Proveedor'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pro_rut',array('label'=>'Rut'));
		echo $this->Form->input('pro_nombre_razon_social',array('label'=>'Nombre_razon_social'));
		echo $this->Form->input('pro_representante_legal',array('label'=>'Representante_legal'));
		echo $this->Form->input('pro_telefono_fijo',array('label'=>'Telefono_fijo'));
		echo $this->Form->input('pro_celular',array('label'=>'Celular'));
		echo $this->Form->input('pro_observaciones',array('label'=>'Observaciones'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>