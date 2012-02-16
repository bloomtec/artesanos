<div class="locales form">
<?php echo $this->Form->create('Local');?>
	<fieldset>
		<h2><?php echo __('Modificar Local'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('calificacion_id');
		echo $this->Form->input('provincia_id');
		echo $this->Form->input('canton_id');
		echo $this->Form->input('ciudad_id');
		echo $this->Form->input('sector_id');
		echo $this->Form->input('parroquia_id');
		echo $this->Form->input('loc_calle_o_avenida');
		echo $this->Form->input('loc_numero');
		echo $this->Form->input('loc_interseccion');
		echo $this->Form->input('loc_barrio');
		echo $this->Form->input('loc_telefono_celular');
		echo $this->Form->input('loc_telefono_convencional');
		echo $this->Form->input('loc_referencia');
		echo $this->Form->input('loc_email');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>