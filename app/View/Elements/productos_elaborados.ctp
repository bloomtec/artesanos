<?php for($i = 0; $i < 5; $i++):
?>
<tr>
	<td><?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.pro_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_productos_elaborados'));?></td>
	<td><?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.pro_detalle', array('label' => false, 'div' => false, 'options' => $detalles_producto));?></td>
	<td><?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.pro_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_producto));?></td>
	<td><?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.pro_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_productos_elaborados valor'));?></td>
</tr>
<?php endfor;?>		