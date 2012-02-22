<?php for($i=0 ; $i<=14; $i++):
?>
<tr>
	<?php echo $this -> Form -> hidden('Trabajador.' . $i . '.tipos_de_trabajador_id', array('value' => 1, 'label' => false, 'div' => false));?>
	<td><?php echo $this -> Form -> number('Trabajador.' . $i . '.tra_cedula', array('label' => false, 'div' => false, 'class' => 'cedulaUnica'));?></td>
	<td><?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_nombres_y_apellidos', array('label' => false, 'div' => false));?></td>
	<td><?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false));?></td>
	<td>
	<?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_fecha_ingreso', array('label' => false, 'div' => false,'class' => 'date','minYear'=>'1910'))?>
		
	<!--<input name='data[Trabajador][<?php echo $i;?>][tra_fecha_ingreso]' type='date' id='Trabajador<?php echo $i;?>TraFechaIngreso' />-->
	</td>
	<td><?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false));?></td>
	<td>
	<?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_fecha_nacimiento', array('label' => false, 'div' => false,'class' => 'date','minYear'=>'1910'))?>	
	<!--<input name='data[Trabajador][<?php echo $i;?>][tra_fecha_nacimiento]' type='date' id='Trabajador<?php echo $i;?>TraFechaNacimiento' />-->
	</td>
	<td><?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_pago_mensual', array('label' => false, 'div' => false, 'class' => 'salarioOperarios'));?></td>
</tr>
<?php endfor;?>
