<div class="ciudades form">
	<?php echo $this -> Form -> create('Ciudad');?>
	<fieldset>
		<h2><?php echo __('Añadir Ciudad');?></h2>
		<?php
		echo $this -> Form -> input('provincia_id', array('label' => 'Provincia', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('canton_id', array('label' => 'Canton', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('ciu_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('controller' => 'geograficos', 'action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function(){
		$('#CiudadProvinciaId').change(function(){
			BJS.updateSelect($("#CiudadCantonId"),"/cantones/getByProvincia/"+$("#CiudadProvinciaId option:selected").val());
		});
	});
</script>