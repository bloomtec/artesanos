<div class='form'>
	<?php
	echo $this -> Form -> create('Page', array('type' => 'file'));
	echo $this -> Form -> input('nombre_del_artesano');
	echo $this -> Form -> input('ruc');
	echo $this -> Form -> input('razon_social');
	echo $this -> Form -> input('rama', array('options' => $ramas, 'label' => 'Rama Artesanal a la que pertenece'));
	echo $this -> Form -> input('productos', array('options' => $productos, 'label' => 'Productos de elaboración', 'multiple' => 'checkbox'));
	echo $this -> Form -> input('imagen_1', array('type' => 'file'));
	echo $this -> Form -> input('imagen_2', array('type' => 'file'));
	echo $this -> Form -> input('imagen_3', array('type' => 'file'));
	echo $this -> Form -> input('provincia', array('options' => $provincias, 'label' => 'Provincia', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('canton', array('options' => array(), 'label' => 'Cantón', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('ciudad', array('options' => array(), 'label' => 'Ciudad', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('parroquia', array('options' => array(), 'label' => 'Parroquia', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('direccion', array('label' => 'Dirección'));
	echo $this -> Form -> input('telefono', array('label' => 'Teléfono', 'class' => 'telefono'));
	echo $this -> Form -> input('celular', array('label' => 'Celular', 'class' => 'celular'));
	echo $this -> Form -> input('email', array('label' => 'Email', 'type' => 'email'));
	echo $this -> Form -> end('Enviar');
?>
</div>
<script type="text/javascript">
	$(function() {
		$("input[type='checkbox']").click(function(e) {
			//alert(BJS.objectSize($("input[type='checkbox'] :checked")));
			if($("input:checked").length > 5) {
				e.preventDefault();
			}
		});
		var actualizarGeoTaller = function() {
			BJS.updateSelect($("#PageCanton"), "/cantones/getByProvincia/" + $("#PageProvincia option:selected").val(), function() {
				BJS.updateSelect($("#PageCiudad"), "/ciudades/getByCanton/" + $("#PageCanton option:selected").val(), function() {
					BJS.updateSelect($("#PageParroquia"), "/parroquias/getByCiudad/" + $("#PageCiudad option:selected").val());
				});
			});
		}
		$('#PageProvincia').change(function() {
			actualizarGeoTaller();
		});
		$('#PageCanton').change(function() {
			BJS.updateSelect($("#PageCiudad"), "/ciudades/getByCanton/" + $("#PageCanton option:selected").val(), function() {
				BJS.updateSelect($("#PageParroquia"), "/parroquias/getByCiudad/" + $("#PageCiudad option:selected").val());
			});
		});
		$('#PageCiudad').change(function() {
			BJS.updateSelect($("#PageParroquia"), "/parroquias/getByCiudad/" +$("#PageCiudad option:selected").val());

		});
	});

</script>
