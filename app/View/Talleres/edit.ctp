<div class="talleres form">
<?php echo $this->Form->create('Taller');?>
	<fieldset>
		<h2><?php echo __('Modificar Taller'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('calificacion_id');
		echo $this->Form->input('tal_razon_social_o_nombre_comercial');
		echo $this->Form->input('provincia_id');
		echo $this->Form->input('canton_id');
		echo $this->Form->input('ciudad_id');
		echo $this->Form->input('parroquia_id');
		echo $this->Form->input('tal_calle_o_avenida');
		echo $this->Form->input('tal_numero');
		echo $this->Form->input('tal_interseccion');
		echo $this->Form->input('tal_barrio');
		echo $this->Form->input('tal_telefono_celular');
		echo $this->Form->input('tal_telefono_convencional');
		echo $this->Form->input('tal_referencia');
		echo $this->Form->input('tal_email');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>