<div class="provincias form">
	<?php echo $this -> Form -> create('Provincia');?>
	<fieldset>
		<h2><?php echo __('Modificar Provincia');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('pro_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('controller' => 'geograficos', 'action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>