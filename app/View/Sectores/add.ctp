<div class="sectores form">
	<?php echo $this -> Form -> create('Sector');?>
	<fieldset>
		<h2><?php echo __('Añadir Sector');?></h2>
		<?php
		echo $this -> Form -> input('ciudad_id');
		echo $this -> Form -> input('sec_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('controller' => 'geograficos', 'action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>