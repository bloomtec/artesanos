<div class="tiposSolicitudesTitulaciones form">
<?php echo $this->Form->create('TiposSolicitudesTitulacion');?>
	<fieldset>
		<h2><?php echo __('Modificar Tipos Solicitudes Titulacion'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tip_nombre',array('label'=>'Nombre'));
		echo $this->Form->input('tip_descripcion',array('label'=>'Descripcion'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>