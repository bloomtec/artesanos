<div class="sectores form">
	<?php echo $this -> Form -> create('Sector');?>
	<fieldset>
		<h2><?php echo __('Modificar Sector');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('provincia_id', array('label' => 'Provincia', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('canton_id', array('label' => 'Canton', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('ciudad_id', array('label' => 'Ciudad', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('sec_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('controller' => 'geograficos', 'action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function(){
		$('#SectorProvinciaId').change(function(){
			BJS.updateSelect($("#SectorCantonId"),"/cantones/getByProvincia/"+$("#SectorProvinciaId option:selected").val(), function() {
				BJS.updateSelect($("#SectorCiudadId"),"/ciudades/getByCanton/"+$("#SectorCantonId option:selected").val());
			});
		});
		$('#SectorCantonId').change(function(){
			BJS.updateSelect($("#SectorCiudadId"),"/ciudades/getByCanton/"+$("#SectorCantonId option:selected").val());
		});
	});
</script>