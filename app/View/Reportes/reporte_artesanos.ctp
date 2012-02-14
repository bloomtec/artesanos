<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte'); ?>
	<h2><?php echo __('Reporte Artesanos'); ?></h2>
	<fieldset>
		<?php
			echo $this -> Form -> input('apellido_paterno');
			echo $this -> Form -> input('apellido_materno');
			echo $this -> Form -> input('nombres');
			echo $this -> Form -> input('cedula', array('label' => 'Cédula De Ciudadanía'));
			echo $this -> Form -> input('fecha_de_nacimiento', array('label' => 'Fecha De Nacimiento (AAAA-MM-DD)'));
			echo $this -> Form -> input('nacionalidad', array('options' => $nacionalidades, 'empty' => 'Seleccione...'));
			echo $this -> Form -> input('tipo_de_sangre', array('options' => $tipos_de_sangre, 'empty' => 'Seleccione...'));
			echo $this -> Form -> input('sexo', array('options' => $sexos, 'empty' => 'Seleccione...'));
			echo $this -> Form -> input('estado_civil', array('options' => $estados_civiles, 'empty' => 'Seleccione...'));
			echo $this -> Form -> input('edad');
			echo $this -> Form -> input('grado_de_estudio', array('options' => $grados_de_estudio, 'empty' => 'Seleccione...'));
			echo $this -> Form -> input('hijos_mayores');
			echo $this -> Form -> input('hijos_menores');
			echo $this -> Form -> input('tipo_de_discapacidad', array('options' => $tipos_de_discapacidad, 'empty' => 'Seleccione...'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar'); ?>
	<?php echo $this -> Form -> end(); ?>
</div>