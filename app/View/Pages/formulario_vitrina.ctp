<?php if(isset($se_envio)){ ?>
<div class='message-mail'>
	<h1>GRACIAS POR CONTACTARNOS</h1>
</div>
<?php }else{ ?>
<div class='form'>
	<?php
	echo $this -> Form -> create('Page', array('type' => 'file'));
	echo $this -> Form -> input('nombre_del_artesano',array('required'=>true));
	echo $this -> Form -> input('ruc',array('required'=>true));
	echo $this -> Form -> input('razon_social',array('required'=>true));
	echo $this -> Form -> input('rama', array('required'=>true,'options' => $ramas, 'label' => 'Rama Artesanal a la que pertenece'));
	echo $this -> Form -> input('productos', array('options' => $productos, 'label' => 'Productos de elaboración', 'multiple' => 'checkbox'));
	echo $this -> Form -> input('imagen_1', array('type' => 'file'));
	echo $this -> Form -> input('imagen_2', array('type' => 'file'));
	echo $this -> Form -> input('imagen_3', array('type' => 'file'));
	echo $this -> Form -> input('provincia', array('required'=>true,'options' => $provincias, 'label' => 'Provincia', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('canton', array('required'=>true,'options' => array(), 'label' => 'Cantón', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('ciudad', array('required'=>true,'options' => array(), 'label' => 'Ciudad', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('parroquia', array('required'=>true,'options' => array(), 'label' => 'Parroquia', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('direccion', array('required'=>true,'label' => 'Dirección'));
	echo $this -> Form -> input('telefono', array('required'=>true,'label' => 'Teléfono', 'class' => 'telefono'));
	echo $this -> Form -> input('celular', array('required'=>true,'label' => 'Celular', 'class' => 'celular'));
	echo $this -> Form -> input('email', array('required'=>true,'label' => 'Email', 'type' => 'email'));
	echo $this -> Form -> end('Enviar');
?>
</div>
<script type="text/javascript">
	$(function() {
		$("input[type='checkbox']").click(function(e) {
			//alert(BJS.objectSize($("input[type='checkbox'] :checked")));
			if($("input:checked").length > 5) {
				e.preventDefault();
				alert('Sólo puede selecionar 5 productos');
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
<?php } ?>