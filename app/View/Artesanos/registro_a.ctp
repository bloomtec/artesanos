<fieldset>
	<div class="datos-personales">
		<h2>Datos Personales</h2>
		<br />
		<br />
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
		<br />
		<br />
		<?php
		echo $this -> Form -> input('Taller.tal_razon_social_o_nombre_comercial', array('label' => 'Razón social y/o nombre comercial:'));
		echo $this -> Form -> input('Taller.provincia_id', array('label' => 'Provincia:'));
		echo $this -> Form -> input('Taller.canton_id', array('label' => 'Canton:'));
		echo $this -> Form -> input('Taller.ciudad_id', array('label' => 'Ciudad:'));
		echo $this -> Form -> input('Taller.parroquia_id', array('label' => 'Parroquia:'));
		echo $this -> Form -> input('Taller.tal_calle_o_avenida', array('label' => 'Calle/Avenida:'));
		echo $this -> Form -> input('Taller.tal_numero', array('label' => 'No.:'));
		echo $this -> Form -> input('Taller.tal_interseccion', array('label' => 'Intersección:'));
		echo $this -> Form -> input('Taller.tal_barrio', array('label' => 'Barrio:'));
		echo $this -> Form -> input('Taller.tal_telefono_celular', array('label' => 'Tel celular:'));
		echo $this -> Form -> input('Taller.tal_telefono_convencional', array('label' => 'Tel convencional:'));
		echo $this -> Form -> input('Taller.tal_referencia', array('label' => 'Referencia:'));
		echo $this -> Form -> input('Taller.tal_email', array('label' => 'Email:'));
		?>
	</div>
	<div class="datos-local">
		<h2>Datos Local Comercial</h2>
		<br />
		<br />
		<?php
		echo $this -> Form -> input('Local.provincia_id', array('label' => 'Provincia:'));
		echo $this -> Form -> input('Local.canton_id', array('label' => 'Canton:'));
		echo $this -> Form -> input('Local.ciudad_id', array('label' => 'Ciudad:'));
		echo $this -> Form -> input('Local.parroquia_id', array('label' => 'Parroquia:'));
		echo $this -> Form -> input('Local.loc_calle_o_avenida', array('label' => 'Calle/Avenida:'));
		echo $this -> Form -> input('Local.loc_numero', array('label' => 'No.:'));
		echo $this -> Form -> input('Local.loc_interseccion', array('label' => 'Interseccion:'));
		echo $this -> Form -> input('Local.loc_barrio', array('label' => 'Barrio:'));
		echo $this -> Form -> input('Local.loc_telefono_celular', array('label' => 'Tel celular:'));
		echo $this -> Form -> input('Local.loc_telefono_convencional', array('label' => 'Tel convencional:'));
		echo $this -> Form -> input('Local.loc_referencia', array('label' => 'Referencia:'));
		echo $this -> Form -> input('Local.loc_email', array('label' => 'Email:'));
		?>
	</div>
</fieldset>
<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
<a id="registroA_continuar" href="#" class="cancelar">Siguiente</a>
<script type="text/javascript">
	$('#registroA_continuar').click(function () {
		$('#DataContainer').load('/artesanos/registroB');
	});
</script>