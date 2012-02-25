<?php for($i =0;$i < 5 ;$i++):?>
<tr>
	<td><?php echo $this -> Form -> input('MateriasPrima.'.$i.'.mat_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_materia_prima'));?></td>
	<td><?php echo $this -> Form -> input('MateriasPrima.'.$i.'.mat_tipo_de_materia_prima', array('label' => false, 'div' => false, 'options' => $tipos_de_materia_prima));?></td>
	<td><?php echo $this -> Form -> input('MateriasPrima.'.$i.'.mat_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_materia_prima));?></td>
	<td><?php echo $this -> Form -> input('MateriasPrima.'.$i.'.mat_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_materia_prima valor'));?></td>
</tr>
<?php endfor;?>