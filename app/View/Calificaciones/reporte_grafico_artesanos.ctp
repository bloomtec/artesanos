<div class="reportes form">
	<?php echo $this -> Form -> create('Calificacion'); ?>
	<fieldset>
		<?php echo $this -> Form -> input('Reporte.rama_id', array('empty' => 'Seleccione...')); ?>
		<?php echo $this -> Form -> input('Reporte.fecha_inicial', array('value' => $fechaActual, 'class' => 'date')); ?>
		<?php echo $this -> Form -> input('Reporte.fecha_final', array('value' => $fechaActual, 'class' => 'date')); ?>
		<?php echo $this -> Form -> input('Reporte.genero', array('options' => $generos, 'empty' => 'Seleccione...')); ?>
		<?php echo $this -> Form -> input('Reporte.provincia', array('options' => $provincias)); ?>
		<?php echo $this -> Form -> input('Reporte.canton', array('type' => 'select')); ?>
		<?php echo $this -> Form -> input('Reporte.ciudad', array('type' => 'select')); ?>
	</fieldset>
	<?php echo $this -> Form -> end('Enviar'); ?>
</div>
<script type="text/javascript">
	$(function() {
		var actualizarSelects = function() {
			BJS.updateSelect($('#ReporteCanton'), '/cantones/getByProvincia/' + $('#ReporteProvincia').val(), function() {
				BJS.updateSelect($('#ReporteCiudad'), '/ciudades/getByCanton/' + $('#ReporteCanton').val());
			});
		}
		actualizarSelects();
		$('#ReporteProvincia').change(function() {
			actualizarSelects();
		});
		$('#ReporteCanton').change(function() {
			BJS.updateSelect($('#ReporteCiudad'), '/ciudades/getByCanton/' + $('#ReporteCanton').val());
		});
	});
</script>