<div class="materiales form">
<?php echo $this->Form->create('Material');?>
	<fieldset>
		<h2><?php echo __('Agregar Material'); ?></h2>
	<?php
		echo $this->Form->input('cantidad');
		echo $this->Form->input('tipo_de_materia_prima');
		echo $this->Form->input('procedencia');
		echo $this->Form->input('valor_comercial');
		echo $this->Form->input('local_id');
		echo $this->Form->input('taller_id');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>