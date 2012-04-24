<!-- <input type="button" value="probando" id="btnPruebaModal" /> -->

		<!--
<div class="modal" id="modal_graficos" style="display: none;" >
	
	<?php echo $this->element("graficos"); ?>
	<div id="chart_div" style="width: 900px; height: 500px;"></div>
</div>
-->

<div class="reportes form" id="datos">
	<h2>GENERAR GRAFICOS</h2>
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
		<?php echo $this -> Form -> End('Enviar', array("id"=>"btnEnviar")); ?>
		
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

<script type="text/javascript">

$(document).ready(function(){
	
	$("#titulo").hide();
	$("#CalificacionReporteGraficoArtesanosForm").submit(function(e) {
			//alert("Entro aqui");
			
			$.post("/calificaciones/reporteGraficoArtesanos", $('#CalificacionReporteGraficoArtesanosForm :input').serialize(), resultado, "json");
			e.preventDefault();
			
			function resultado(data) { //VALORES DEL REPORTE
				if(data.ramas.length==0) {
					alert("No hay datos para graficar");
					e.preventDefault();
					return false;
				}
				$("#titulo").show();
				$("#chart1").show();
				$("#chart2").show();
				$("#chart3").show();
				$("#chart4").show();
				$("#chart5").show();
				$("#titulo").show();
				
				$.jqplot.config.enablePlugins = true;
		        var s1 = data.artesanos;
		        var ticks = data.ramas;
	        
	        	plot1 = $.jqplot('chart1', [s1], {
	            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
	            animate: !$.jqplot.use_excanvas,
	            seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true }
	            },
	           

	            series:[
	            {label:'Hotel'},
	            {label:'Event Regristration'},
	            {label:'Airfare'}
		        ],
		        
		            title:'GRAFICO 1 - NUMERO DE CALIFICADOS',
		       		 
		            axes: {
		                xaxis: {
		                    renderer: $.jqplot.CategoryAxisRenderer,
		                    ticks: ticks
		                }
		            },
		            
		        series:[
			            {label:'Numero de calificados'}
			           
			        ],
	            legend: {
	                show: true,
	                location: 'e',
	                placement: 'outside'
            	},
		            
		       
		        grid: {
					        drawGridLines: false,
					        background: '#fffdf6'
					    },
		        });
	    
		        $('#chart1').bind('jqplotDataClick', 
		            function (ev, seriesIndex, pointIndex, data) {
		                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
		        	}
	        	);
          
          
          //Grafico 2
          $.jqplot.config.enablePlugins = true;
		        var s1 = data.TotalInversion;
		        var ticks = data.ramas;
	        
	        	plot1 = $.jqplot('chart2', [s1], {
	            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
	            animate: !$.jqplot.use_excanvas,
	            seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true }
	            },
	            
	            series:[
	            {label:'Hotel'},
	            {label:'Event Regristration'},
	            {label:'Airfare'}
		        ],
		        
		            title:'GRAFICO 2 - NIVEL DE INVERSIÓN',
		       		 
		            axes: {
		                xaxis: {
		                    renderer: $.jqplot.CategoryAxisRenderer,
		                    ticks: ticks
		                },
		                yaxis: {
			                pad: 1.05,
			                tickOptions: {formatString: '$%d'}
			            }
		            },
		            
		         series:[
			            {label:'Nivel de inversión'}
			           
			        ],
	            legend: {
	                show: true,
	                location: 'e',
	                placement: 'outside'
            	},
            	 
		        grid: {
					        drawGridLines: false,
					        background: '#fffdf6'
					    },
		        });
	    
		        $('#chart2').bind('jqplotDataClick', 
		            function (ev, seriesIndex, pointIndex, data) {
		                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
		        	}
	        	);
          
          
          //GRAFICO 3
          $.jqplot.config.enablePlugins = true;
		        var s1 = data.PromedioIngresos;
		        var ticks = data.ramas;
	        
	        	plot1 = $.jqplot('chart3', [s1], {
	            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
	            animate: !$.jqplot.use_excanvas,
	            seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true }
	            },
	            
	           series:[
			            {label:'Promedio de ingresos'}
			           
			        ],
	            legend: {
	                show: true,
	                location: 'e',
	                placement: 'outside'
            	},
		      
		        
		            title:'GRAFICO 3 - PROMEDIO DE INGRESOS',
		       		 
		            axes: {
		                xaxis: {
		                    renderer: $.jqplot.CategoryAxisRenderer,
		                    ticks: ticks
		                },
		                yaxis: {
			                pad: 1.05,
			                tickOptions: {formatString: '$%d'}
			            }
		            },
		            
		            
		        grid: {
					        drawGridLines: false,
					        background: '#fffdf6'
					    },
		        });
	    
		        $('#chart3').bind('jqplotDataClick', 
		            function (ev, seriesIndex, pointIndex, data) {
		                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
		        	}
	        	);
          
          	
          	  //GRAFICO 4
          $.jqplot.config.enablePlugins = true;
		        var s1 = data.PromedioOperarios;
		        var s2 = data.PromedioAprendices;
		        var ticks = data.ramas;
	        
	        	plot1 = $.jqplot('chart4', [s1, s2], {
	            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
	            
	            animate: !$.jqplot.use_excanvas,
	            seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true }
	            },
	            
	             series:[
			            {label:'Promedio operarios'},
			            {label:'Promedio aprendices'}
			        ],
	            legend: {
	                show: true,
	                location: 'e',
	                placement: 'outside'
            	},
	           
		        
		            title:'GRAFICO 4 - PROMEDIO NUMERO DE OPERACIONES, PROMEDIO NUMERO DE APRENDICES',
		       		 
		            axes: {
		                xaxis: {
		                    renderer: $.jqplot.CategoryAxisRenderer,
		                    ticks: ticks
		                }
		            },
		            
		           
		        grid: {
					        drawGridLines: false,
					        background: '#fffdf6'
					    },
		        });
	    
		        $('#chart4').bind('jqplotDataClick', 
		            function (ev, seriesIndex, pointIndex, data) {
		                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
		        	}
	        	);
	        	
          
          
         
    
           /* $("#dynamicTable").append("<table>");
            $("#dynamicTable").append("<tr>");
            $("#dynamicTable").append("<th>Ramas</th>");
            $("#dynamicTable").append("<th>Numero de artesanos</th>");
            $("#dynamicTable").append("</tr>");
          
            
         

            $("#dynamicTable").append("<tr>");
            $("#dynamicTable").append("<td>what</td>");
            $("#dynamicTable").append("<td>now</td>");
            $("#dynamicTable").append("</tr>");

         
            $("#dynamicTable").append("</table>"); */
          $("#datos").hide();
		}
			
	});

 });
	 
</script>
<div id="dynamicTable"></div>
<h2 id="titulo">GRAFICOS<br /></h2>

<div id="chart1" style="margin-top:20px; margin-left:20px; width:300px; height:300px; display: none; "></div>
<div id="chart2" style="margin-top:30px; margin-left:20px; width:300px; height:300px;display: none;"></div>
<div id="chart3" style="margin-top:30px; margin-left:20px; width:300px; height:300px;display: none;"></div>
<div id="chart4" style="margin-top:30px; margin-left:20px; width:300px; height:300px;display: none;"></div>

