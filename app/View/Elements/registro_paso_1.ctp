<fieldset>
	<div class="datos-personales">
		<h2>Calificación</h2>
		<div class="fila-datos" row="0">
			<?php
			echo $this -> Form -> input('art_cedula', array('label' => 'Cédula de ciudadania/pasaporte:', 'col' => '0'));
			echo $this -> Form -> input('dat_apellido_paterno', array('label' => 'Apellido paterno:', 'col' => '1'));
			echo $this -> Form -> input('dat_apellido_materno', array('label' => 'Apellido materno:', 'col' => '2'));
			echo $this -> Form -> input('dat_nombres', array('label' => 'Nombres:', 'col' => '3'));
			?>
		</div>
		<h2>Datos Personales</h2>
		<div class="fila-datos" row="1">
			<?php
			echo $this -> Form -> input('dat_nacionalidad', array('label' => 'Nacionalidad:', 'type' => 'select', 'options' => $nacionalidades, 'empty' => 'Seleccione...', 'col' => '0'));
			echo $this -> Form -> input('dat_apellido_paterno', array('label' => 'Apellido paterno:', 'col' => '1'));
			echo $this -> Form -> input('dat_apellido_materno', array('label' => 'Apellido materno:', 'col' => '2'));
			echo $this -> Form -> input('dat_nombres', array('label' => 'Nombres:', 'col' => '3'));
			
			?>
		</div>
		<div class="fila-datos" row="2">
			<?php
			echo $this -> Form -> input('dat_fecha_nacimiento', array('label' => 'Fecha de nacimiento:', 'col' => '1'));
			echo $this -> Form -> input('dat_tipo_de_sangre', array('label' => 'Tipo de sangre:', 'type' => 'select', 'options' => $tipos_de_sangre, 'empty' => 'Seleccione...', 'col' => '2'));
			echo $this -> Form -> input('dat_estado_civil', array('label' => 'Estado civil:', 'type' => 'select', 'options' => $estados_civiles, 'empty' => 'Seleccione...', 'col' => '3'));
			echo $this -> Form -> input('dat_grado_estudio', array('label' => 'Grado de estudio:', 'type' => 'select', 'options' => $grados_de_estudio, 'empty' => 'Seleccione...', 'col' => '4'));
			echo $this -> Form -> input('dat_sexo', array('label' => 'Sexo:', 'type' => 'select', 'options' => $sexos, 'empty' => 'Seleccione...', 'col' => '5'));
			?>
		</div>
		<div class="fila-datos" row="3">
			<?php
			echo $this -> Form -> input('dat_hijos_mayores', array('type'=>'number','label' => 'No. de hijos mayores:', 'col' => '0'));
			echo $this -> Form -> input('dat_hijos_menores', array('type'=>'number','label' => 'No. de hijos menores:', 'col' => '1'));
			echo $this -> Form -> input('dat_tipo_discapacidad', array('label' => 'Tipo de discapacidad:', 'type' => 'select', 'options' => $tipos_de_discapacidad, 'empty' => 'Seleccione...', 'col' => '2'));
			echo $this -> Form -> input('dat_porcentaje_de_discapacidad', array('label' => 'Porcentaje de discapacidad:', 'col' => '3'));
			?>
		</div>
	</div>
	<div class="datos-taller">
		<h2>Datos Taller</h2>
		<br />
		<br />
		<div class="fila-datos" row="4">
			<?php
			echo $this -> Form -> input('Taller.tal_razon_social_o_nombre_comercial', array('label' => 'Razón social y/o nombre comercial:', 'col' => '0'));
			echo $this -> Form -> input('Taller.provincia_id', array('label' => 'Provincia:', 'col' => '1'));
			echo $this -> Form -> input('Taller.canton_id', array('label' => 'Canton:', 'col' => '2'));
			echo $this -> Form -> input('Taller.ciudad_id', array('label' => 'Ciudad:', 'col' => '3'));
			?>
		</div>
		<div class="fila-datos" row="5">
			<?php
			echo $this -> Form -> input('Taller.sector_id', array('label' => 'Sector:', 'col' => '0'));
			echo $this -> Form -> input('Taller.parroquia_id', array('label' => 'Parroquia:', 'col' => '1'));
			echo $this -> Form -> input('Taller.tal_calle_o_avenida', array('label' => 'Calle/Avenida:', 'col' => '2'));
			echo $this -> Form -> input('Taller.tal_numero', array('label' => 'No.:', 'col' => '3'));
			?>
		</div>
		<div class="fila-datos" row="6">
			<?php
			echo $this -> Form -> input('Taller.tal_interseccion', array('label' => 'Intersección:', 'col' => '0'));
			echo $this -> Form -> input('Taller.tal_barrio', array('label' => 'Barrio:', 'col' => '1'));
			echo $this -> Form -> input('Taller.tal_telefono_celular', array('label' => 'Tel celular:', 'col' => '2'));
			echo $this -> Form -> input('Taller.tal_telefono_convencional', array('label' => 'Tel convencional:', 'col' => '3'));
			?>
		</div>
		<div class="fila-datos" row="7">
			<?php
			echo $this -> Form -> input('Taller.tal_referencia', array('label' => 'Referencia:', 'col' => '0'));
			echo $this -> Form -> input('Taller.tal_email', array('label' => 'Email:', 'col' => '1'));
			?>
		</div>
	</div>
	<div class="datos-local">
		<h2>Datos Local Comercial</h2>
		<br />
		<br />
		<div class="fila-datos" row="8">
			<?php
			echo $this -> Form -> input('Local.provincia_id', array('label' => 'Provincia:', 'col' => '0'));
			echo $this -> Form -> input('Local.canton_id', array('label' => 'Canton:', 'col' => '1'));
			echo $this -> Form -> input('Local.ciudad_id', array('label' => 'Ciudad:', 'col' => '2'));
			?>
		</div>
		<div class="fila-datos" row="9">
			<?php
			echo $this -> Form -> input('Local.sector_id', array('label' => 'Sector:', 'col' => '0'));
			echo $this -> Form -> input('Local.parroquia_id', array('label' => 'Parroquia:', 'col' => '1'));
			echo $this -> Form -> input('Local.loc_calle_o_avenida', array('label' => 'Calle/Avenida:', 'col' => '2'));
			echo $this -> Form -> input('Local.loc_numero', array('label' => 'No.:', 'col' => '3'));
			?>
		</div>
		<div class="fila-datos" row="10">
			<?php
			echo $this -> Form -> input('Local.loc_interseccion', array('label' => 'Interseccion:', 'col' => '0'));
			echo $this -> Form -> input('Local.loc_barrio', array('label' => 'Barrio:', 'col' => '1'));
			echo $this -> Form -> input('Local.loc_telefono_celular', array('label' => 'Tel celular:', 'col' => '2'));
			echo $this -> Form -> input('Local.loc_telefono_convencional', array('label' => 'Tel convencional:', 'col' => '3'));
			?>
		</div>
		<div class="fila-datos" row="11">
			<?php
			echo $this -> Form -> input('Local.loc_referencia', array('label' => 'Referencia:', 'col' => '0'));
			echo $this -> Form -> input('Local.loc_email', array('label' => 'Email:', 'col' => '1'));
			?>
		</div>
	</div>
</fieldset>
<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
<a id="registro_paso_1_continuar" href="#" class="cancelar">Siguiente</a>