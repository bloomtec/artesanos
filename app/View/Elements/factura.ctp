<h2>Datos Factura</h2>
<?php
$provincias = $this -> requestAction('/provincias/getProvincias');
echo $this -> Form -> input('Factura.fac_numero', array('label' => 'No. De Factura'));
echo $this -> Form -> input('Factura.fac_comprobante_deposito', array('label' => 'No. De Comprobante De Deposito'));
echo $this -> Form -> input('Factura.fac_cliente', array('label' => 'Cliente'));
echo $this -> Form -> input('Factura.provincia_id', array('label' => 'Provincia', 'options' => $provincias, 'empty' => 'Seleccione...'));
echo $this -> Form -> input('Factura.canton_id', array('label' => 'Canton'));
echo $this -> Form -> input('Factura.ciudad_id', array('label' => 'Ciudad'));
echo $this -> Form -> input('Factura.fac_direccion', array('label' => 'Dirección'));
echo $this -> Form -> input('Factura.fac_telefono', array('label' => 'Teléfono'));
echo $this -> Form -> input('Factura.fac_ruc_doc', array('label' => 'R.U.C./C.I.'));
if(isset($fecha) && $fecha) {
	echo $this -> Form -> hidden('Factura.fac_fecha_emision', array('label' => 'Fecha De Emisión','type'=>'text','class'=>'date', 'value' => $fecha));
	echo $this -> Form -> input('Factura.fac_fecha_emision', array('label' => 'Fecha De Emisión','type'=>'text','class'=>'date', 'value' => $fecha, 'disabled' => 'disabled'));
} else {
	echo $this -> Form -> input('Factura.fac_fecha_emision', array('label' => 'Fecha De Emisión','type'=>'text','class'=>'date'));
}
?>
<script type="text/javascript">
	$(function(){
		var actualizarGeoTaller = function() {
			BJS.updateSelect($("#FacturaCantonId"), "/cantones/getByProvincia/" + $("#FacturaProvinciaId option:selected").val(), function() {
				BJS.updateSelect($("#FacturaCiudadId"), "/ciudades/getByCanton/" + $("#FacturaCantonId option:selected").val(), function() {
					BJS.updateSelect($("#FacturaParroquiaId"), "/parroquias/getByCiudad/" + $("#FacturaCiudadId option:selected").val());
				});
			});
		}
		$('#FacturaProvinciaId').change(function() {
			actualizarGeoTaller();
		});
		$('#FacturaCantonId').change(function() {
			BJS.updateSelect($("#FacturaCiudadId"), "/ciudades/getByCanton/" + $("#FacturaCantonId option:selected").val(), function() {
				BJS.updateSelect($("#FacturaParroquiaId"), "/parroquias/getByCiudad/" + $("#FacturaCiudadId option:selected").val());
			});
		});
		actualizarGeoTaller();
	});
</script>