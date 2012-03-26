<div class="cantones form">
<?php echo $this->Form->create('Canton');?>
	<fieldset>
		<h2><?php echo __('Agregar Canton'); ?></h2>
	<?php
		echo $this->Form->input('provincia_id');
		echo $this->Form->input('can_nombre',array('label'=>'Nombre'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>