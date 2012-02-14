<div class="gruposDeRamas form">
	<?php echo $this -> Form -> create('GruposDeRama');?>
	<fieldset>
		<h2><?php echo __('Agregar Grupo De Ramas');?></h2>
		<?php
		echo $this -> Form -> input('gru_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('gru_descipcion', array('label' => 'Descripción'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>