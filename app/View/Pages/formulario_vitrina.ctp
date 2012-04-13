<?php if(isset($se_envio)){ ?>
<div class='message-mail'>
	<h1>GRACIAS POR CONTACTARNOS</h1>
</div>
<?php }else{?>
<div class='form'>
	<?php
	echo $this -> Form -> create('Page', array('type' => 'file'));
	echo $this -> Form -> input('nombre_del_artesano', array('required' => true));
	echo $this -> Form -> input('ruc', array('required' => true, 'class' => 'number'));
	echo $this -> Form -> input('razon_social', array('required' => true));
	echo $this -> Form -> input('rama', array('required' => true, 'options' => $ramas, 'label' => 'Rama Artesanal a la que pertenece'));
	echo "<div class='productos'>";
	echo "<h2'>Productos de elaboración</h2>";
	?>
	<table  id="productos" show="1" till="10">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Precio Preferencial</th>
				<th>Tiempo de entrega</th>
				<th>Imagenes</th>
			</tr>
		</thead>
	<?php
	for ($i = 0; $i < 5; $i += 1) {
	?>	
	<tr>
		<td> <?php echo $this -> Form -> input("Producto." . $i . ".nombre", array('label' => false ,'type' => 'text')); ?> </td>
		<td> <?php echo $this -> Form -> input("Producto." . $i . ".precio_referencial", array('label' => false, 'type' => 'text'));  ?> </td>
		<td> <?php  echo $this -> Form -> input("Producto." . $i . ".tiempo_de_entrega", array('label' => false, 'type' => 'text'));  ?> </td>
		<td>
			<?php 
			echo $this -> Form -> input("Producto." . $i . ".imagen_1", array('type' => 'file'));  
			echo $this -> Form -> input("Producto." . $i . ".imagen_2", array('type' => 'file'));
			echo $this -> Form -> input("Producto." . $i . ".imagen_3", array('type' => 'file')); 
			?> 
		</td>
	</tr>
	<?php 
	}
	?>
	</table>
	<a class="add-row button" href="#" rel="#productos">Agregar Otro</a>
	<?php
	echo "</div>";
	echo $this -> Form -> input('provincia', array('required' => true, 'options' => $provincias, 'label' => 'Provincia', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('canton', array('required' => true, 'options' => array(), 'label' => 'Cantón', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('ciudad', array('required' => true, 'options' => array(), 'label' => 'Ciudad', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('parroquia', array('required' => true, 'options' => array(), 'label' => 'Parroquia', 'empty' => 'seleccione...'));
	echo $this -> Form -> input('direccion', array('required' => true, 'label' => 'Dirección'));
	echo $this -> Form -> input('telefono', array('required' => true, 'label' => 'Teléfono', 'class' => 'telefono'));
	echo $this -> Form -> input('celular', array('required' => true, 'label' => 'Celular', 'class' => 'celular'));
	echo $this -> Form -> input('email', array('required' => true, 'label' => 'Email', 'type' => 'email'));
	echo $this -> Form -> end('Enviar');
?>
</div>
<script type="text/javascript">
	$(function() {

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
			BJS.updateSelect($("#PageParroquia"), "/parroquias/getByCiudad/" + $("#PageCiudad option:selected").val());

		});
		$('#PageFormularioVitrinaForm').submit(function(e) {
			if(!checkRucEcuador($('#PageRuc').val())) {
				e.preventDefault();
			}
		});
	});

</script>
<?php }?>