<div class="ciudades form">
	<?php echo $this -> Form -> create('Ciudad');?>
	<fieldset>
		<h2><?php echo __('Modificar Ciudad');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('canton_id');
		echo $this -> Form -> input('ciu_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('controller' => 'geograficos', 'action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>