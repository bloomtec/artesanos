<?php if($reporte==false) { ?>
<div class="reportes form" id="datos">
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
		<?php echo $this -> Form -> submit('Enviar'); ?>
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
</div>
<?php } ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#CalificacionReporteGraficoArtesanosForm").submit(function(e) {
		$("#formReporte").hide();
		$.post("/calificaciones/reporteGraficoArtesanos/1", $('#CalificacionReporteGraficoArtesanosForm :input').serialize(), resultado, "json");
		//e.preventDefault();
		var dat;
		function resultado(data){ //VALORES DEL REPORTE
		  dat = data;
		}
		
		google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ramas', 'Numero de calificados'],
          ['2004',     400],
          ['2005',     460],
          ['2006',     1120],
          ['2007',     540]
        ]);

        var options = {
          title: 'Reporte 1',
          hAxis: {title: 'Ramas', titleTextStyle: {color: 'blue'}},
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
			e.preventDefault();
	});
})
	 
</script>
<div id="chart_div" style="width: 900px; height: 500px;"></div>