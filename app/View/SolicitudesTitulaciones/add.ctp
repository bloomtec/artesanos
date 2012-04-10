<div class="solicitudesTitulaciones form">
	<?php echo $this -> Form -> create('SolicitudesTitulacion', array('type' => 'file'));?>
	<fieldset>
		<h2><?php echo __('Agregar Solicitudes Titulacion');?></h2>
		<div class='cedula-box'>
			<?php echo $this -> Form -> input('cedula_artesanos', array('class' => 'artesanoSelect controlSelects cedula', 'label' => false, 'type' => 'text', 'placeholder' => 'digite la cedula del artesano'));?>
			<a class='button validarCedula' href='#'>validar</a>
		</div>
		<div style='clear:both;' class="form-titulacion">
			<?php
			echo $this -> Form -> hidden('estados_solicitudes_titulacion_id', array('value' => 1));
			echo $this -> Form -> input('titulo_id', array('empty' => 'Seleccione...'));
			echo $this -> Form -> input('tipos_solicitudes_titulacion_id', array('empty' => 'Seleccione...'));
			echo $this -> Form -> input('artesano_id', array('empty' => 'Seleccione...'));
			?>
			<div id="archivos1" style="display:none;">
				<!--
				poner aca lo de los archivos
				formato :: echo $this -> Form -> input('Archivos.$i.archivo', array('type' => 'file'));
				-->
				<?php
				echo $this -> Form -> input('Archivos1.1.cedula', array('type' => 'file', 'label' => 'Cedula de identidad o ciudadanía'));
				echo $this -> Form -> input('Archivos1.2.certificadoVotacion', array('type' => 'file', 'label' => 'Certificado de votación'));
				echo $this -> Form -> input('Archivos1.3.cedulaMilitar', array('type' => 'file', 'label' => 'Copia cedula militar(Opcional)'));
				echo $this -> Form -> input('Archivos1.4.declaracion', array('type' => 'file', 'label' => 'Declaracion juramentada'));
				echo $this -> Form -> input('Archivos1.5.certificadoInstruccion', array('type' => 'file', 'label' => 'Certificado instrucción'));
				echo $this -> Form -> input('Archivos1.6.memoriaDescriptiva', array('type' => 'file', 'label' => 'Memoria descriptiva'));
				?>
			</div>
			<div id="archivos2" style="display:none;">
				<!--
				poner aca lo de los archivos
				formato :: echo $this -> Form -> input('Archivos.$i.archivo', array('type' => 'file'));
				-->
				<?php
				echo $this -> Form -> input('Archivos2.1.solicitudMiembros', array('type' => 'file', 'label' => 'Solicitud a miembros'));
				echo $this -> Form -> input('Archivos2.2.copiaCedula', array('type' => 'file', 'label' => 'Copia cedula identidad o ciudadania'));
				echo $this -> Form -> input('Archivos2.3.copiaCertificado', array('type' => 'file', 'label' => 'Copia certificado votación'));
				echo $this -> Form -> input('Archivos2.4.cedulaMilitar', array('type' => 'file', 'label' => 'Copia cedula militar'));
				echo $this -> Form -> input('Archivos2.5.copiaTituloPractico', array('type' => 'file', 'label' => 'Copia titulo practico'));
				echo $this -> Form -> input('Archivos2.6.memoriaDescriptiva', array('type' => 'file', 'label' => 'Memoria descriptiva'));
				?>
			</div>
		</div>
	</fieldset>
	<br />
	<br />
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<style>
	.ventasEspecies.form form {
		width: 550px;
	}
	.form-titulacion {
		display: none;
	}
</style>
<script type="text/javascript">
	$(function() {
		$('#SolicitudesTitulacionTiposSolicitudesTitulacionId').change();

		$('.validarCedula').click(function() {
			BJS.JSON('/artesanos/getDatosPersonales/' + $('.cedula').val(), {}, function(datosPersonales) {
				if(datosPersonales) {
					$('.form-titulacion').show();
					$('#VentasEspecieArtesanoId').val(datosPersonales.Artesano.id);
					console.log(datosPersonales.DatosPersonal.nombre_completo);
				} else {
					$('.form-titulacion').hide();
					alert('No existe un artesano con este documento en la base de datos');
				}

			});
		});
	});

</script>