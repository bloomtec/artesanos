<fieldset>
	<div class="datos-personales">
		<h2>Datos Personales</h2>
		<?php
		echo $this -> Form -> input('art_cedula', array('label' => 'Cédula de ciudadania/pasaporte:'));
		echo $this -> Form -> input('dat_apellido_paterno', array('label' => 'Apellido paterno:'));
		echo $this -> Form -> input('dat_apellido_materno', array('label' => 'Apellido materno:'));
		echo $this -> Form -> input('dat_nombres', array('label' => 'Nombres:'));
		echo $this -> Form -> input('dat_nacionalidad', array('label' => 'Nacionalidad:', 'type' => 'select'));
		echo $this -> Form -> input('dat_fecha_nacimiento', array('label' => 'Fecha de nacimiento:'));
		echo $this -> Form -> input('dat_tipo_de_sangre', array('label' => 'Tipo de sangre:', 'type' => 'select'));
		echo $this -> Form -> input('dat_estado_civil', array('label' => 'Estado civil:', 'type' => 'select'));
		echo $this -> Form -> input('dat_grado_estudio', array('label' => 'Grado de estudio:', 'type' => 'select'));
		echo $this -> Form -> input('dat_sexo', array('label' => 'Sexo:', 'type' => 'select'));
		echo $this -> Form -> input('dat_hijos_mayores', array('label' => 'No. de hijos mayores:'));
		echo $this -> Form -> input('dat_hijos_menores', array('label' => 'No. de hijos menores:'));
		echo $this -> Form -> input('dat_tipo_discapacidad', array('label' => 'Tipo de discapacidad:', 'type' => 'select'));
		echo $this -> Form -> input('dat_porcentaje_de_discapacidad', array('label' => 'Porcentaje de discapacidad:'));
		?>
	</div>
	<div class="datos-taller">
		<h2>Datos Taller</h2>
	</div>
	<div class="datos-local">
		<h2>Datos Local Comercial</h2>
	</div>
</fieldset>
<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
<a href="#" class="cancelar">Siguiente</a>