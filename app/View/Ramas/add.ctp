<div class="ramas form">
<?php echo $this->Form->create('Rama');?>
	<fieldset>
		<h2><?php echo __('Agregar Rama'); ?></h2>
	<?php
		echo $this->Form->input('grupos_de_rama_id');
		echo $this->Form->input('ram_nombre');
		echo $this->Form->input('ram_descripcion');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>