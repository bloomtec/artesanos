<div class="parametrosInformativos form">
<?php echo $this->Form->create('ParametrosInformativo');?>
	<fieldset>
		<h2><?php echo __('Agregar Parametro Informativo'); ?></h2>
	<?php
		echo $this->Form->input('par_nombre');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>