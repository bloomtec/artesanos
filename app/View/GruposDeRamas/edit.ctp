<div class="gruposDeRamas form">
<?php echo $this->Form->create('GruposDeRama');?>
	<fieldset>
		<h2><?php echo __('Modificar Grupos De Rama'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('gru_nombre');
		echo $this->Form->input('gru_descipcion');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>