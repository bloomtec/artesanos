<div class="titulos form">
<?php echo $this->Form->create('Titulo');?>
	<fieldset>
		<h2><?php echo __('Modificar Titulo'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rama_id');
		echo $this->Form->input('tit_nombre',array('label'=>'Nombre'));
		echo $this->Form->input('tit_descripcion',array('label'=>'Descripcion'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>