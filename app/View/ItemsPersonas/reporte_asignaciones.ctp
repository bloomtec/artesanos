<div class="reporte asignaciones">
	<?php echo $this -> Form -> create('ItemsPersona'); ?>
	<fieldset>
		<?php
			echo $this -> Form -> input('item_id', array('empty' => 'Seleccione...'));
			echo $this -> Form -> input('departamento_id', array('empty' => 'Seleccione...'));
			echo $this -> Form -> input('persona_id', array('empty' => 'Seleccione...'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end('Generar Reporte'); ?>
</div>