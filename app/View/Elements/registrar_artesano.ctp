<!-- REGISTRAR ALUMNO -->
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
