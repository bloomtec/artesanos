<div class="ramas form">
	<?php echo $this -> Form -> create('Rama');?>
	<fieldset>
		<h2><?php echo __('Modificar Rama');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('grupos_de_rama_id', array('label' => 'Grupo De Ramas'));
		echo $this -> Form -> input('ram_codigo', array('label' => 'Código'));
		echo $this -> Form -> input('ram_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('ram_descripcion', array('label' => 'Descripción'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), $referer, array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>