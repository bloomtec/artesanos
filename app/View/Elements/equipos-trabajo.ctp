<?php for($i = 0; $i<10; $i++):
?>
<tr>
	<td><?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_maquinas number','type'=>'text'));?></td>
	<td><?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_maquinaria_y_herramientas', array('label' => false, 'div' => false, 'options' => $maquinarias_y_herramientas));?></td>
	<td><?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_tipo_de_adquisicion', array('label' => false, 'div' => false, 'options' => $tipos_de_adquisicion_maquinaria));?></td>
	<td>
		<?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_fecha_de_adquisicion', array('label' => false, 'div' => false,'class' => 'date','type'=>'text'));?> 
	<!--<input name="data[EquiposDeTrabajo][<?php echo $i?>][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajo<?php echo $i?>EquFechaDeAdquisicion"> -->
	</td>
	<td><?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_maquinas valor', 'type'=>'text'));?></td>
</tr>
<?php endfor;?>