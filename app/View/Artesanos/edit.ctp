<div class="artesanos form">
<?php echo $this->Form->create('Artesano');?>
	<fieldset>
		<h2><?php echo __('Modificar Artesano'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('art_cedula');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>