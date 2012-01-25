<div class="inspecciones form">
<?php echo $this->Form->create('Inspeccion');?>
	<fieldset>
		<h2><?php echo __('Agregar Inspeccion'); ?></h2>
	<?php
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('artesano_id');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('local_id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>