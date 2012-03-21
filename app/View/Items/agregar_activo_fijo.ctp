<div class="items form">
	<?php echo $this -> Form -> create('Item');?>
	<fieldset>
		<h2><?php echo __('Agregar Activo Fijo');?></h2>
		<?php echo $this -> Form -> input('IngresosDeInventario.'); ?>
		<?php echo $this -> Form -> input('ite_codigo', array('label' => 'Código')); ?>
		<?php echo $this -> Form -> input('ite_tipo_de_item', array('label' => 'Tipo De Ítem', 'type' => 'select', 'options' => $tiposDeItems)); ?>
		<?php echo $this -> Form -> input('ite_nombre', array('label' => 'Nombre')); ?>
		<?php echo $this -> Form -> input('ite_descripcion', array('label' => 'Descripción')); ?>
		<?php echo $this -> Form -> input('ite_observaciones', array('label' => 'Observaciones')); ?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>