<div class="certificados form">
<?php echo $this->Form->create('Certificado');?>
	<fieldset>
		<h2><?php echo __('Modificar Certificado'); ?></h2>
	<?php
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>