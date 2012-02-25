<?php for($i=15; $i<=19; $i++):
?>
<tr>
	<?php echo $this -> Form -> hidden('Trabajador.' . $i . '.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false));?>
	<td><?php echo $this -> Form -> input('Trabajador.' . $i . '.is_cedula', array('label' => false, 'type' => 'select', 'options' => array('1' => 'Cédula', '0' => 'Pasaporte'), 'class' => 'selectCedula'));?>
	<?php echo $this -> Form -> number('Trabajador.' . $i . '.tra_cedula', array('label' => false, 'div' => false, 'class' => 'cedulaUnica valor'));?></td>
	<td><?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_nombres_y_apellidos', array('label' => false, 'div' => false, 'class' => 'nombres'));?></td>
	<td><?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false, 'class' => 'sexo'));?></td>
	<td><?php echo $this -> Form -> date('Trabajador.' . $i . '.tra_fecha_ingreso', array('label' => false, 'div' => false,'class' => 'date','type'=>'date'))
	?></td>
	<td><?php echo $this -> Form -> input('Trabajador.' . $i . '.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false, 'class' => 'afiliado_seguro'));?></td>
	<td><?php echo $this -> Form -> date('Trabajador.' . $i . '.tra_fecha_nacimiento', array('label' => false, 'div' => false,'class' => 'date fecha_nacimiento'))
	?></td>
	<td><?php echo $this -> Form -> number('Trabajador.' . $i . '.tra_pago_mensual', array('label' => false, 'div' => false, 'class' => 'salarioAprendiz valor'));?></td>
</tr>
<?php endfor;?>