<div class="juntasProvinciales form">
	<?php echo $this -> Form -> create('JuntasProvincial');?>
	<fieldset>
		<h2><?php echo __('Modificar Junta Provincial');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('provincia_id', array('label' => 'Provincia', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('jun_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>