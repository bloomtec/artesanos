<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2><?php echo __('Reporte De Inspecciones');?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('fecha_inicial', array('type' => 'date'));
		echo $this -> Form -> input('fecha_final', array('type' => 'date'));
		echo $this -> Form -> input('estado', array('empty' => 'Seleccione...', 'options' => array(-1 => 'Denegado', 0 => 'Pendiente', 1 => 'Aprobado')));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>