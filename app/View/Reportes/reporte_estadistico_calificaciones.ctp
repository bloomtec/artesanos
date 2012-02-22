<!-- Seccion formulario consulta reporte -->
<?php if(!$mostrar_reporte) : ?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte'); ?>
	<h2><?php echo __('Reporte Estadistico De Calificaciones'); ?></h2>
	<fieldset>
		<?php		
			echo $this -> Form -> input('fecha_de_calificacion');
			echo $this -> Form -> input('provincia');
			echo $this -> Form -> input('canton');
			echo $this -> Form -> input('ciudad');
			echo $this -> Form -> input('sector');
			echo $this -> Form -> input('parroquia');
			echo $this -> Form -> input('nacionalidad');
		?>
		<div class="input text campos-de-edad">
			<label for="ReporteEdadMin">Rango De Edad</label>
			<input type="text" id="ReporteEdadMin" name="data[Reporte][edad_min]" class="campo-edad-min">
			-
			<input type="text" id="ReporteEdadMax" name="data[Reporte][edad_max]" class="campo-edad-max">
		</div>
		<?php
			echo $this -> Form -> input('grado_de_estudio');
			echo $this -> Form -> input('sexo');
			echo $this -> Form -> input('tipo_de_discapacidad');
			echo $this -> Form -> input('hijos_mayores');
			echo $this -> Form -> input('hijos_menores');
			
		?>
	</fieldset>
	<?php // echo $this -> Form -> submit('Buscar'); ?>
	<?php echo $this -> Form -> end(); ?>
</div>
<?php endif;?>
<!-- Sección informe reporte -->
<?php if($mostrar_reporte) : ?>
<div class="reportes informe">
	
</div>
<?php endif;?>