<style>
	form {
		width: 600px;
	}
	.usu-cedula{
		width: 225px;
	}
	form .input label {
		display: block;
		float: left;
		font-size: 13px;
		height: 16px;
		margin: 0 0 2px;
		padding: 8px 0 0;
		width: 225px;
	}
</style>
<div class="alumnos form">
	<?php echo $this -> Form -> create('Alumno');?>
	<fieldset>
		<h2><?php echo __('Agregar Alumno');?></h2>
		<?php
		echo $this -> Form -> input('is_capacitacion', array('label' => false, 'div' => 'input select usu-cedula', 'options' => array('0' => 'Centro o unidad de formación', '1' => 'Capacitacion')));
		echo $this -> Form -> input('centros_artesanal_id', array('label' => false, "style" => "margin-top:10px"));
		echo $this -> Form -> input('alu_nacionalidad', array('label' => 'Nacionalidad', 'options' => $nacionalidades, 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('alu_is_cedula', array('label' => false, 'div' => 'input select usu-cedula', 'type' => 'select', 'options' => array('1' => 'Cédula: ', '0' => 'Pasaporte: ')));
		echo $this -> Form -> input('alu_documento_de_identificacion', array('label' => false, "style" => "margin-top:5px"));
		echo $this -> Form -> input('alu_apellido_paterno', array('label' => 'Apellido Paterno'));
		echo $this -> Form -> input('alu_apellido_materno', array('label' => 'Apellido Materno'));
		echo $this -> Form -> input('alu_nombres', array('label' => 'Nombres'));
		echo $this -> Form -> input('alu_fecha_de_nacimiento', array('label' => 'Fecha De Nacimiento', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('alu_tipo_de_sangre', array('label' => 'Tipo De Sangre', 'options' => $tipos_de_sangre, 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('alu_estado_civil', array('label' => 'Estado Civil', 'options' => $estados_civiles, 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('alu_grado_de_estudio', array('label' => 'Grado De Estudio', 'options' => $grados_de_estudio, 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('alu_sexo', array('label' => 'Sexo', 'options' => $sexos, 'empty' => 'Seleccione...'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function() {
		switch($('#AlumnoAluIsCedula').val()) {
			case "0":
				// PASAPORTE
				$('#AlumnoAluDocumentoDeIdentificacion').setMask({
					mask : '*',
					type : 'repeat'
				}).val();
				break;
			case "1":
				// CEDULA
				$('#AlumnoAluDocumentoDeIdentificacion').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
		checkCapacitacion();
		$('#AlumnoIsCapacitacion').change(function(){
			checkCapacitacion();
		});
		function checkCapacitacion(){
			switch($('#AlumnoIsCapacitacion').val()) {
			case "0":
				// Centro artesanal
				
				$('#AlumnoCentrosArtesanalId').removeAttr('disabled').show();
				break;
			case "1":
				// Capacitacion
				$('#AlumnoCentrosArtesanalId').attr('disabled',true).hide();
				break;
		}
		}
	});

</script>