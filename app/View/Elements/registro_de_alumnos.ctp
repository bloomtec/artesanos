<style>
	#registroAlumnos input {
		width: 100px;
	}
</style>
<div class="buscador-alumnos">
	<?php //debug($alumnos);?>
	<?php //debug($this -> data);?>
	<table  id="registroAlumnos" show="12" till="200">
		<tr>
			<th>Documento de identidad</th>
			<th>Nombre completo</th>
		</tr>
		<?php for($i=0; $i<200; $i++):
		?>
		<tr>
			<td><?php $id = isset($alumnos[$i]['Alumno']) ? $alumnos[$i]['Alumno']['id'] : "";?>
			<?php if($id){
			?>
			<span> <?php
			echo $alumnos[$i]['Alumno']['alu_documento_de_identificacion'];
			echo $this -> Form -> hidden('Alumno.Alumno.' . $i, array('class' => 'id', 'rel' => $i, "value" => $id));
				?></span><?php }else{?>
			<input type='text' class='inputDocumento' rel='<?php echo $i;?>' value="<?php if(isset($this -> data['Extra']['Alumno'][$i])) echo $this -> data['Extra']['Alumno'][$i]['documento']?>" />
			<?php
			$idExtra = isset($this -> data['Extra']['Alumno'][$i]['id']) ? $this -> data['Extra']['Alumno'][$i]['id'] : "";
			$cedulaExtra = isset($this -> data['Extra']['Alumno'][$i]['documento']) ? $this -> data['Extra']['Alumno'][$i]['documento'] : "";
			$labelExtra = isset($this -> data['Extra']['Alumno'][$i]['label']) ? $this -> data['Extra']['Alumno'][$i]['label'] : "";
			echo $this -> Form -> hidden('Alumno.Alumno.' . $i, array('class' => 'id', 'rel' => $i, "value" => $idExtra));
			echo $this -> Form -> hidden('Extra.Alumno.' . $i . '.id', array('class' => 'id', 'rel' => $i, "value" => $idExtra));
			echo $this -> Form -> hidden('Extra.Alumno.' . $i . '.documento', array('class' => 'documento', 'rel' => $i, "value" => $cedulaExtra));
			echo $this -> Form -> hidden('Extra.Alumno.' . $i . '.label', array('class' => 'label', 'rel' => $i, "value" => $labelExtra));
			?>
			<?php }?></td>
			<td><span rel='<?php echo $i;?>'> <?php
			if (isset($id) && isset($alumnos[$i]['Alumno'])) {
				echo $alumnos[$i]['Alumno']['alu_nombres'] . " " . $alumnos[$i]['Alumno']['alu_apellido_paterno'] . " " . $alumnos[$i]['Alumno']['alu_apellido_materno'];
			} else {
				if (isset($this -> data['Extra']['Alumno'][$i])) {
					echo $this -> data['Extra']['Alumno'][$i]['label'];
				}
			}
				?></span></td>
		</tr>
		<?php endfor;?>
	</table>
	<a href="#" id="regAlumno" class="button">Registrar nuevo alumno</a>
	<a class="add-row button" href="#" rel="#registroAlumnos">Agregar Otro</a>
</div>
<div class="alumnos-container"></div>
<script type="text/javascript">
	$(function() {
		$(".inputDocumento").keydown(function() {
			var $that = $(this);
			$("input.id[rel='" + $that.attr('rel') + "']").val("");

		});
		$(".inputDocumento").blur(function() {
			var $that = $(this);
			if($that.val()) {
				BJS.JSON("/alumnos/get/"+ $that.val()+"/<?php echo $curso['Solicitud']['centros_artesanal_id']?>", {}, function(data) {
					if(data) {
						$("input.id[rel='" + $that.attr('rel') + "'][class='id']").val(data.Alumno.id);
						$("input.documento[rel='" + $that.attr('rel') + "']").val(data.Alumno.alu_documento_de_identificacion);
						$("input.label[rel='" + $that.attr('rel') + "']").val(data.Alumno.alu_nombres + " " + data.Alumno.alu_apellido_paterno + " " + data.Alumno.alu_apellido_materno);
						$("span[rel='" + $that.attr('rel') + "']").text(data.Alumno.alu_nombres + " " + data.Alumno.alu_apellido_paterno + " " + data.Alumno.alu_apellido_materno);
					} else {
						$that.focus();
						alert('El alumno no se encuentra registrado');
					}
				});
			}
		});
	});

</script>
<!-- REGISTRAR ALUMNO -->
<div class="modal" id="modal_registro_alumnos" style="display: none;" >
	<div class="alumnos form" id="divCampos">
		<fieldset>
			<h2><?php echo __('Agregar Nuevo Alumno');?></h2>
			<table border=1>
				<tr>
					<td>Nacionalidad</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_nacionalidad', array('label' => false, 'options' => $nacionalidades, 'empty' => 'Seleccione...'));?></td>
				</tr>
				<tr>
					<td><?php echo $this -> Form -> input('Alumno.alu_is_cedula', array('label' => false, 'id' => 'txtTipoDoc', 'type' => 'select', 'options' => array('1' => 'Cédula: ', '0' => 'Pasaporte: ')));?></td>
					<td><?php echo $this -> Form -> input('Alumno.alu_documento_de_identificacion', array('label' => false, "id"=>"txtId","class"=>"number required","style"=>"margin-top:5px")); ?></td>
				</tr>
				<tr>
					<td>Apellido paterno</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_apellido_paterno', array('label' => 'Apellido Paterno'));?></td>
				</tr>
				<tr>
					<td>Apellido materno</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_apellido_materno', array('label' => 'Apellido Materno'));?></td>
				</tr>
				<tr>
					<td>Nombres</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_nombres', array('label' => 'Nombres'));?></td>
				</tr>
				<tr>
					<td>Fecha de nacimiento</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_fecha_de_nacimiento', array('label' => 'Fecha De Nacimiento', 'type' => 'text', 'class' => 'date'));?></td>
				</tr>
				<tr>
					<td>Tipo de sangre</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_tipo_de_sangre', array('label' => 'Tipo De Sangre', 'options' => $tipos_de_sangre, 'empty' => 'Seleccione...'));?></td>
				</tr>
				<tr>
					<td>Estado civil</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_estado_civil', array('label' => 'Estado Civil', 'options' => $estados_civiles, 'empty' => 'Seleccione...'));?></td>
				</tr>
				<tr>
					<td>Grado de estudio</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_grado_de_estudio', array('label' => 'Grado De Estudio', 'options' => $grados_de_estudio, 'empty' => 'Seleccione...'));?></td>
				</tr>
				<tr>
					<td>Sexo</td>
					<td><?php echo $this -> Form -> input('Alumno.alu_sexo', array('label' => 'Sexo', 'options' => $sexos, 'empty' => 'Seleccione...'));?></td>
				</tr>
			</table>
		</fieldset>
		<a href="#" id="btnModalRegAlumno" class="button submit">Guardar</a>
		<a href="#" id="btnCerrar" class="button">Cerrar</a>
	</div>
	<div>
