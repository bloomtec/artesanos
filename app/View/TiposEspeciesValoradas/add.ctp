<div class="especiesValoradas form">
<?php echo $this->Form->create('TiposEspeciesValorada');?>
	<fieldset>
		<h2><?php echo __('Agregar Especies Valorada'); ?></h2>
	<?php
		echo $this->Form->input('tip_nombre',array('label'=>'Nombre'));
		echo $this->Form->input('tip_codigo',array('label'=>'Codigo','type'=>'text','class'=>'number'));
		echo $this->Form->input('tip_valor_unitario',array('label'=>'Valor Unitario','type'=>'text','class'=>'valor'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>