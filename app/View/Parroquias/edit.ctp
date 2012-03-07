<div class="parroquias form">
	<?php echo $this -> Form -> create('Parroquia');?>
	<fieldset>
		<h2><?php echo __('Modificar Parroquia');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('provincia_id', array('label' => 'Provincia', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('canton_id', array('label' => 'Canton', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('ciudad_id', array('label' => 'Ciudad', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('sector_id', array('label' => 'Sector', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('par_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('controller' => 'geograficos', 'action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function(){
		$('#ParroquiaProvinciaId').change(function(){
			BJS.updateSelect($("#ParroquiaCantonId"),"/cantones/getByProvincia/"+$("#ParroquiaProvinciaId option:selected").val(), function() {
				BJS.updateSelect($("#ParroquiaCiudadId"),"/ciudades/getByCanton/"+$("#ParroquiaCantonId option:selected").val(), function(){
					BJS.updateSelect($("#ParroquiaSectorId"),"/sectores/getByCiudad/"+$("#ParroquiaCiudadId option:selected").val());
				});
			});
		});
		$('#ParroquiaCantonId').change(function(){
			BJS.updateSelect($("#ParroquiaCiudadId"),"/ciudades/getByCanton/"+$("#ParroquiaCantonId option:selected").val(), function(){
				BJS.updateSelect($("#ParroquiaSectorId"),"/sectores/getByCiudad/"+$("#ParroquiaCiudadId option:selected").val());
			});
		});
		$('#ParroquiaCiudadId').change(function(){
			BJS.updateSelect($("#ParroquiaSectorId"),"/sectores/getByCiudad/"+$("#ParroquiaCiudadId option:selected").val());
		});
	});
</script>