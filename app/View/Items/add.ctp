<div class="items form">
	<?php echo $this -> Form -> create('Item');?>
	<fieldset>
		<h2><?php echo __('Agregar Item');?></h2>
		<?php
		//echo $this -> Form -> input('ite_codigo', array('label' => 'Codigo'));
		//echo $this -> Form -> input('ite_tipo_de_item', array('label' => 'Tipo De Item', 'type' => 'select', 'options' => $tiposDeItems));
		echo $this -> Form -> input('ite_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('ite_is_activo_fijo', array('label' => 'Activo Fijo'));
		echo $this -> Form -> input('ite_descripcion', array('label' => 'Descripción'));
		echo $this -> Form -> input('ite_observaciones', array('label' => 'Observaciones'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>