<div class="modal2" id="modal_registro_artesano" style="display: none;" >
<div class="artesanos form">
	<?php echo $this -> Form -> create('Artesano');?>
	<fieldset>
		<h2><?php echo __('Agregar Artesano');?></h2>
		<?php
		echo $this -> Form -> input('art_is_cedula', array('label' => false, 'div' => 'input select usu-cedula', 'type' => 'select', 'options' => array('1' => 'Cédula: ', '0' => 'Pasaporte: ')));
		echo $this -> Form -> input('art_cedula', array('label' => false, "style" => "margin-top:5px", "class" => ""));
		?>
		<div class="fila-datos" row="1">
			<?php
			echo $this -> Form -> input('art_nacionalidad', array('label' => 'Nacionalidad:', 'type' => 'select', 'options' => $nacionalidades, 'empty' => 'Seleccione...', 'col' => '0'));
			echo $this -> Form -> input('art_apellido_paterno', array('label' => 'Apellido paterno:', 'col' => '1'));
			echo $this -> Form -> input('art_apellido_materno', array('label' => 'Apellido materno:', 'col' => '2'));
			echo $this -> Form -> input('art_nombres', array('label' => 'Nombres:', 'col' => '3'));
			echo $this -> Form -> input('art_fecha_nacimiento', array('label' => 'Fecha de nacimiento:', 'col' => '0', 'label' => 'Fecha de Nacimiento', 'type' => 'text', 'class' => 'date'));
			?>
			<div style="clear:both"></div>
		</div>
		<div class="fila-datos" row="2">
			<?php
			echo $this -> Form -> input('art_tipo_de_sangre', array('style' => 'width:100px;', 'label' => 'Tipo de sangre:', 'type' => 'select', 'options' => $tipos_de_sangre, 'empty' => 'Seleccione...', 'col' => '1'));
			echo $this -> Form -> input('art_estado_civil', array('style' => 'width:100px;', 'label' => 'Estado civil:', 'type' => 'select', 'options' => $estados_civiles, 'empty' => 'Seleccione...', 'col' => '2'));
			echo $this -> Form -> input('art_grado_estudio', array('style' => 'width:100px;', 'label' => 'Grado de estudio:', 'type' => 'select', 'options' => $grados_de_estudio, 'empty' => 'Seleccione...', 'col' => '3'));
			echo $this -> Form -> input('art_sexo', array('label' => 'Sexo:', 'type' => 'select', 'options' => $sexos, 'empty' => 'Seleccione...', 'col' => '4'));
			?>
			<?php
			echo $this -> Form -> input('art_hijos_mayores', array('type' => 'text', 'class' => 'number', 'label' => 'Hijos mayores:', 'col' => '0'));
			echo $this -> Form -> input('art_hijos_menores', array('type' => 'text', 'class' => 'number', 'label' => 'Hijos menores:', 'col' => '1'));
			echo $this -> Form -> input('art_tipo_discapacidad', array('label' => 'Tipo de discapacidad:', 'type' => 'select', 'options' => $tipos_de_discapacidad, 'empty' => 'Ninguna', 'col' => '2'));
			echo $this -> Form -> input('art_porcentaje_de_discapacidad', array('style' => 'width:60px;', 'label' => 'Porcentaje:', 'div' => 'input porcentaje', 'col' => '3', 'class' => 'porcentaje', 'type' => 'text'));
			?>
			<div style="clear:both"></div>
		</div>
	</fieldset>
	<a class="button" id="btnModalRegArtesano2" >Guardar</a>
	<a class="button" id="btnCerrar" >Cancelar</a>
</form>

</div>
<script type="text/javascript">
	$(function() {
		$('.porcentaje').hide();
		switch($('#ArtesanoArtIsCedula').val()) {
			case "0":
				// PASAPORTE
				$('#ArtesanoArtCedula').setMask({
					mask : '*',
					type : 'repeat'
				}).val();
				break;
			case "1":
				// CEDULA
				$('#ArtesanoArtCedula').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
		$('#ArtesanoArtTipoDiscapacidad').change(function() {
			if($(this).find('option:selected').val()) {
				$('.porcentaje').show();
			} else {
				$('.porcentaje').hide();
				$('.porcentaje input').val("");
			}
		});
	});

</script>
</div>

<!-- REGISTRAR ALUMNO 
<div class="modal" id="modal_registro_artesano" style="display: none;" >
	<div id="divCampos">
		<fieldset>
			<h2><?php echo __('Agregar Nuevo Artesano');?></h2>
			<table border=1>
				<tr>
					<td>Cedula artesano</td>
					<td><?php echo $this -> Form -> input('art_cedula', array('label' => false,"id"=>"txtCedula"));?></td>
				</tr>

			</table>
		</fieldset>
		<a href="#" id="btnModalRegArtesano2" class="button">Guardar</a>
		<a href="#" id="btnCerrar" class="button">Cerrar</a><br/><br/>
	</div>
<div>
-->