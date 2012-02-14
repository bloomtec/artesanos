<!-- Seccion formulario consulta reporte -->
<?php if(!$mostrar_reporte) : ?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte'); ?>
	<h2><?php echo __('Reporte Artesanos'); ?></h2>
	<fieldset>
		<?php
			echo $this -> Form -> input('apellido_paterno');
			echo $this -> Form -> input('apellido_materno');
			echo $this -> Form -> input('nombres');
			echo $this -> Form -> input('cedula', array('label' => 'Cédula De Ciudadanía'));
			echo $this -> Form -> input('fecha_de_nacimiento');
			echo $this -> Form -> input('nacionalidad');
			echo $this -> Form -> input('tipo_de_sangre');
			echo $this -> Form -> input('sexo');
			echo $this -> Form -> input('estado_civil');
			echo $this -> Form -> input('edad');
			echo $this -> Form -> input('grado_de_estudio');
			echo $this -> Form -> input('hijos_mayores');
			echo $this -> Form -> input('hijos_menores');
			echo $this -> Form -> input('tipo_de_discapacidad');
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar'); ?>
	<?php echo $this -> Form -> end(); ?>
</div>
<?php endif;?>
<!-- Sección informe reporte -->
<?php if($mostrar_reporte) : ?>
<div class="reportes informe">
	
</div>
<?php endif;?>