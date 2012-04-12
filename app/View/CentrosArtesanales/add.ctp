<div class="centrosArtesanales form">
	<?php echo $this -> Form -> create('CentrosArtesanal');?>
	<fieldset>
		<h2><?php echo __('Agregar Centro Artesanal');?></h2>
		<?php
		echo $this -> Form -> input('cen_ruc', array('label' => 'Ruc'));
		echo $this -> Form -> input('cen_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('provincia_id', array('empty' => 'Seleccione...'));
		echo $this -> Form -> input('canton_id');
		echo $this -> Form -> input('ciudad_id');
		echo $this -> Form -> input('parroquia_id');
		echo $this -> Form -> input('direccion', array('label' => 'Dirección'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function() {
		var actualizarGeoTaller = function() {
			BJS.updateSelect($("#CentrosArtesanalCantonId"), "/cantones/getByProvincia/" + $("#CentrosArtesanalProvinciaId option:selected").val(), function() {
				BJS.updateSelect($("#CentrosArtesanalCiudadId"), "/ciudades/getByCanton/" + $("#CentrosArtesanalCantonId option:selected").val(), function() {
					BJS.updateSelect($("#CentrosArtesanalParroquiaId"), "/parroquias/getByCiudad/" + $("#CentrosArtesanalCiudadId option:selected").val());
				});
			});
		}
		$('#CentrosArtesanalProvinciaId').change(function() {
			actualizarGeoTaller();
		});
		$('#CentrosArtesanalCantonId').change(function() {
			BJS.updateSelect($("#CentrosArtesanalCiudadId"), "/ciudades/getByCanton/" + $("#CentrosArtesanalCantonId option:selected").val(), function() {
				BJS.updateSelect($("#CentrosArtesanalParroquiaId"), "/parroquias/getByCiudad/" + $("#CentrosArtesanalCiudadId option:selected").val());
			});
		});
		$('#CentrosArtesanalCiudadId').change(function() {
			BJS.updateSelect($("#CentrosArtesanalParroquiaId"), "/parroquias/getByCiudad/" + $("#CentrosArtesanalCiudadId option:selected").val());
		});
		actualizarGeoTaller();
	});

</script>