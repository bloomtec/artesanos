<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2><?php echo __('Reporte De Inspecciones');?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('fecha_inicial', array('type' => 'date'));
		echo $this -> Form -> input('fecha_final', array('type' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>