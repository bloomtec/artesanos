<fieldset>
	<div class="Calificacion">
		<h2>Calificación</h2>
		<div class="fila-datos validarCalificacion" row="0">
			<?php
			echo $this -> Form -> input('Calificacion.tipos_de_calificacion_id', array('label' => 'Tipo De Calificación:', 'col' => '0', 'options' => $tipos_de_calificacion));
			echo $this -> Form -> input('grupos_de_rama_id', array('label' => 'Grupo de rama:', 'col' => '1', 'options' => $grupos_de_ramas));
			echo $this -> Form -> input('Calificacion.rama_id', array('label' => 'Rama:', 'col' => '2', 'options' => array()));
			echo $this -> Form -> input('art_is_cedula', array('label' => '&nbsp', 'type' => 'select','options'=>array('1'=>'Cédula: ','0'=>'Pasaporte: ')));
			
			echo $this -> Form -> input('art_cedula', array('label' => '&nbsp', 'type' => 'text','div'=>'input text','class'=>'number'));
			echo $this -> Html -> link('validar', "#",array("class"=>'button'));
			?>
			<div style="clear:both"></div>
		</div>
	</div>
	<div class="datos-personales validar tovalidate">
		<h2>Datos Personales</h2>
		<div class="fila-datos" row="1">
			<?php
			echo $this -> Form -> input('DatosPersonal.dat_nacionalidad', array('label' => 'Nacionalidad:', 'type' => 'select', 'options' => $nacionalidades, 'empty' => 'Seleccione...', 'col' => '0'));
			echo $this -> Form -> input('DatosPersonal.dat_apellido_paterno', array('label' => 'Apellido paterno:', 'col' => '1'));
			echo $this -> Form -> input('DatosPersonal.dat_apellido_materno', array('label' => 'Apellido materno:', 'col' => '2'));
			echo $this -> Form -> input('DatosPersonal.dat_nombres', array('label' => 'Nombres:', 'col' => '3'));
			?>
			<div style="clear:both"></div>
		</div>
		<div class="fila-datos" row="2">
			<?php
			echo $this -> Form -> input('DatosPersonal.dat_fecha_nacimiento', array('label' => 'Fecha de nacimiento:', 'col' => '0','label'=>'Fecha de Nacimiento','type'=>'text','class'=>'date'));
			echo $this -> Form -> input('DatosPersonal.dat_tipo_de_sangre', array('label' => 'Tipo de sangre:', 'type' => 'select', 'options' => $tipos_de_sangre, 'empty' => 'Seleccione...', 'col' => '1'));
			echo $this -> Form -> input('DatosPersonal.dat_estado_civil', array('label' => 'Estado civil:', 'type' => 'select', 'options' => $estados_civiles, 'empty' => 'Seleccione...', 'col' => '2'));
			echo $this -> Form -> input('DatosPersonal.dat_grado_estudio', array('label' => 'Grado de estudio:', 'type' => 'select', 'options' => $grados_de_estudio, 'empty' => 'Seleccione...', 'col' => '3'));
			echo $this -> Form -> input('DatosPersonal.dat_sexo', array('label' => 'Sexo:', 'type' => 'select', 'options' => $sexos, 'empty' => 'Seleccione...', 'col' => '4'));
			?>
			<div style="clear:both"></div>
		</div>
		<div class="fila-datos" row="3">
			<?php
			echo $this -> Form -> input('DatosPersonal.dat_hijos_mayores', array('type'=>'text','class' => 'number','label' => 'No. de hijos mayores:', 'col' => '0'));
			echo $this -> Form -> input('DatosPersonal.dat_hijos_menores', array('type'=>'text','class' => 'number', 'label' => 'No. de hijos menores:', 'col' => '1'));
			echo $this -> Form -> input('DatosPersonal.dat_tipo_discapacidad', array('label' => 'Tipo de discapacidad:', 'type' => 'select', 'options' => $tipos_de_discapacidad, 'empty' => 'Ninguna', 'col' => '2'));
			echo $this -> Form -> input('DatosPersonal.dat_porcentaje_de_discapacidad', array('label' => 'Porcentaje de discapacidad:', 'div' => 'input porcentaje', 'col' => '3','class'=>'porcentaje','type'=>'text'));
			?>
			<div style="clear:both"></div>
		</div>
	</div>
	<div class="datos-taller validar tovalidate">
		<h2>Datos Taller</h2>
		<div class="fila-datos" row="4">
			<?php
			echo $this -> Form -> input('Taller.tal_razon_social_o_nombre_comercial', array('label' => 'Razón social y/o nombre comercial:', 'col' => '0'));
			?>
			<div style="clear:both"></div>
		</div>
		<div class="fila-datos" row="4">
			<?php
			echo $this -> Form -> input('Taller.provincia_id', array('label' => 'Provincia:', 'col' => '1'));
			echo $this -> Form -> input('Taller.canton_id', array('label' => 'Canton:', 'col' => '2'));
			echo $this -> Form -> input('Taller.ciudad_id', array('label' => 'Ciudad:', 'col' => '3'));
			echo $this -> Form -> input('Taller.sector_id', array('label' => 'Sector:', 'col' => '0'));
			echo $this -> Form -> input('Taller.parroquia_id', array('label' => 'Parroquia:', 'col' => '1'));
			
			?>
			<div style="clear:both"></div>
		</div>
		<div class="fila-datos" row="5">
			<?php
			
			
			echo $this -> Form -> input('Taller.tal_calle_o_avenida', array('style'=>'width:150px;','label' => 'Calle/Avenida:', 'col' => '2'));
			echo $this -> Form -> input('Taller.tal_numero', array('style'=>'width:50px;','label' => 'No.:', 'col' => '3'));
			echo $this -> Form -> input('Taller.tal_interseccion', array('style'=>'width:130px;','label' => 'Intersección:', 'col' => '4'));
			echo $this -> Form -> input('Taller.tal_barrio', array('style'=>'width:130px;','label' => 'Barrio:', 'col' => '5'));
			echo $this -> Form -> input('Taller.tal_referencia', array('style'=>'width:130px;','label' => 'Referencia:', 'col' => '2'));
			?>
			<div style="clear:both"></div>
		</div>

		<div class="fila-datos" row="7">
			<?php
			echo $this -> Form -> input('Taller.tal_telefono_celular', array('label' => 'Tel celular:', 'col' => '0','class'=>'celular'));
			echo $this -> Form -> input('Taller.tal_telefono_convencional', array('label' => 'Tel convencional:', 'col' => '1', 'class'=>'telefono'));
			echo $this -> Form -> input('Taller.tal_email', array('type'=>'email','label' => 'Email:', 'col' => '3'));
			?>
			<div style="clear:both"></div>
		</div>
	</div>
	<div class="datos-local validar">
		<h2>Datos Local Comercial <?php echo $this -> Form -> input('has_local',array('label'=>false,'type'=>'checkbox')); ?></h2>
		
		<div class="fila-datos" row="8">
			<?php
			echo $this -> Form -> input('Local.provincia_id', array('label' => 'Provincia:', 'col' => '0'));
			echo $this -> Form -> input('Local.canton_id', array('label' => 'Canton:', 'col' => '1'));
			echo $this -> Form -> input('Local.ciudad_id', array('label' => 'Ciudad:', 'col' => '2'));
			echo $this -> Form -> input('Local.sector_id', array('label' => 'Sector:', 'col' => '0'));
			echo $this -> Form -> input('Local.parroquia_id', array('label' => 'Parroquia:', 'col' => '1'));
			?>
			<div style="clear:both"></div>
		</div>
		<div class="fila-datos" row="9">
			<?php
			
			echo $this -> Form -> input('Local.loc_calle_o_avenida', array('style'=>'width:170px;','label' => 'Calle/Avenida:', 'col' => '2'));
			echo $this -> Form -> input('Local.loc_numero', array('style'=>'width:50px;','label' => 'No.:', 'col' => '3'));
			echo $this -> Form -> input('Local.loc_interseccion', array('label' => 'Interseccion:', 'col' => '0'));
			echo $this -> Form -> input('Local.loc_barrio', array('label' => 'Barrio:', 'col' => '1'));
			
			?>
			<div style="clear:both"></div>
		</div>
		<div class="fila-datos" row="10">
			<?php
			echo $this -> Form -> input('Local.loc_referencia', array('label' => 'Referencia:', 'col' => '0'));
			echo $this -> Form -> input('Local.loc_telefono_celular', array('label' => 'Tel celular:', 'class' => 'celular'));
			echo $this -> Form -> input('Local.loc_telefono_convencional', array('label' => 'Tel convencional:', 'class' => 'telefono'));
			echo $this -> Form -> input('Local.loc_email', array('type'=>'email','label' => 'Email:', 'col' => '1'));
			?>
			<div style="clear:both"></div>
		</div>
	</div>
	<div class='actions validar'>
		<?php //echo $this -> Html -> link(__('Cancelar'), "#", array('class' => 'prev button'));?>
		<?php echo $this -> Html -> link(__('Continuar'), "#", array('class' => 'next button'));?>
		<div style="clear:both;"></div>
	</div>
	<div style="clear:both;"></div>
</fieldset>
