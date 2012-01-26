<div class="talleres form">
<?php echo $this->Form->create('Taller');?>
	<fieldset>
		<h2><?php echo __('Modificar Taller'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('razon_social_o_nombre_comercial');
		echo $this->Form->input('pichincha');
		echo $this->Form->input('canton');
		echo $this->Form->input('ciudad');
		echo $this->Form->input('parroquia');
		echo $this->Form->input('calle_o_avenida');
		echo $this->Form->input('numero');
		echo $this->Form->input('interseccion');
		echo $this->Form->input('barrio');
		echo $this->Form->input('telefono_celular');
		echo $this->Form->input('telefono_convencional');
		echo $this->Form->input('referencia');
		echo $this->Form->input('email');
		echo $this->Form->input('artesano_id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>