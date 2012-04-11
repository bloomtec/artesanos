<h2>Datos Factura</h2>
<?php
$provincias = $this -> requestAction('/provincias/getProvincias');
echo $this -> Form -> input('Factura.fac_numero', array('label' => 'No. De Factura'));
echo $this -> Form -> input('Factura.fac_comprobante_deposito', array('label' => 'No. De Comprobante De Deposito'));
echo $this -> Form -> input('Factura.fac_cliente', array('label' => 'Cliente'));
echo $this -> Form -> input('Factura.provincia_id', array('label' => 'Provincia', 'options' => $provincias));
echo $this -> Form -> input('Factura.canton_id', array('label' => 'Canton'));
echo $this -> Form -> input('Factura.ciudad_id', array('label' => 'Ciudad'));
echo $this -> Form -> input('Factura.fac_direccion', array('label' => 'Dirección'));
echo $this -> Form -> input('Factura.fac_telefono', array('label' => 'Teléfono'));
echo $this -> Form -> input('Factura.fac_ruc_doc', array('label' => 'R.U.C./C.I.'));
echo $this -> Form -> input('Factura.fac_fecha_emision', array('label' => 'Fecha De Emisión'));
?>
<script type="text/javascript">
	$(function(){
		
	});
</script>