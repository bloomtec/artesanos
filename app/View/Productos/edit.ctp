<div class="productos form">
	<?php echo $this -> Form -> create('Producto');?>
	<fieldset>
		<h2><?php echo __('Modificar Producto');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('pro_codigo', array('label' => 'Codigo', 'disabled' => true));
		echo $this -> Form -> input('pro_tipo_de_producto', array('label' => 'Tipo De Producto', 'type' => 'select', 'options' => $tiposDeProductos));
		echo $this -> Form -> input('pro_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('pro_descripcion', array('label' => 'Descripción'));
		echo $this -> Form -> input('pro_observaciones', array('label' => 'Observaciones'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>