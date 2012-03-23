<div class="alumnos form">
	<?php echo $this -> Form -> create('Alumno');?>
	<fieldset>
		<h2><?php echo __('Agregar Alumno');?></h2>
		<?php
		echo $this -> Form -> input('alu_nacionalidad', array('label' => 'Nacionalidad', 'options' => $nacionalidades, 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('alu_is_cedula', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('1'=>'Cédula: ','0'=>'Pasaporte: ')));	
		
		echo $this -> Form -> input('alu_documento_de_identificacion', array('label' => false,"style"=>"margin-top:5px"));
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
	$(function(){
		switch($('#AlumnoAluIsCedula').val()){
			case "0": // PASAPORTE
			$('#AlumnoAluDocumentoDeIdentificacion').setMask({ mask : '*', type : 'repeat' }).val();
			break;
			case "1": // CEDULA
			$('#AlumnoAluDocumentoDeIdentificacion').setMask({ mask : '9999', type : 'repeat' }).val();
			break;
		}
	});
</script>