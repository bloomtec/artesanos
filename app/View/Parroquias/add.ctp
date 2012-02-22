<div class="parroquias form">
	<?php echo $this -> Form -> create('Parroquia');?>
	<fieldset>
		<h2><?php echo __('Añadir Parroquia');?></h2>
		<?php
		echo $this -> Form -> input('sector_id');
		echo $this -> Form -> input('par_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('controller' => 'geograficos', 'action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>