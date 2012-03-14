<div class="productos form">
	<?php echo $this -> Form -> create('Producto');?>
	<fieldset>
		<h2><?php echo __('Agregar Producto');?></h2>
		<?php
		echo $this -> Form -> input('pro_name', array('label' => 'Nombre'));
		echo $this -> Form -> input('pro_observaciones', array('label' => 'Observaciones'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>