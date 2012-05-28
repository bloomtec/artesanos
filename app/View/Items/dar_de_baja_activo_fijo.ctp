<div class="items form">
	<?php
		echo $this -> Form -> create('Item');
		echo $this -> Form -> hidden('id');
		echo $this -> Form -> hidden('ite_cantidad');
	?>
	<fieldset>
		<h2><?php echo __('Dar De Baja Activo Fijo');?></h2>
		<table>
			<tr><th>Item</th><th>Cantidad Total Item</th><th>Cantidad No Asignada</th></tr>
			<tr>
				<td><?php echo $item['Item']['ite_nombre']; ?></td>
				<td><?php echo $item['Item']['ite_cantidad']; ?></td>
				<td><?php echo $this -> Form -> input('para_dar_de_baja', array('type' => 'select', 'options' => $cantidades, 'label' => false, 'div' => false, 'class' => false)); ?></td>
			</tr>
		</table>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'indexActivosFijos'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>