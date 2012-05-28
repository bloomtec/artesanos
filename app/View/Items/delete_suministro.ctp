<?php echo $this -> Html -> script('inventarios'); ?>
<div class="items form">
	<?php echo $this -> Form -> create('Item', array('type' => 'file'));?>
	<fieldset>
		<h2><?php echo __(' Egreso suministro');?></h2>
		<?php echo $this -> Form -> input('Persona.per_departamento', array('label' => 'Departamento', 'type' => 'select', 'options' => $departamentos)); ?>
		<?php echo $this -> Form -> input('EgresosDeInventario.persona_id', array('empty' => 'Seleccione...', 'class' => 'inv-persona')); ?>
		<?php echo $this -> Form -> input('EgresosDeInventario.egr_concepto_entrega', array('label' => 'Concepto De Entrega')); ?>
		<?php echo $this -> Form -> input('EgresosDeInventario.egr_archivo_soporte', array('type' => 'file', 'label' => 'Documento De Soporte')); ?>
		<table id="TablaActivosFijos" class="activos-fijos inventario" show="5" till="20">
			<tr>
				<th>Suministro</th>
				<th>Cantidad</th>
				<th>Detalle</th>
			</tr>
			<?php for($i = 1; $i <= 20; $i += 1): ?>
			<tr class="activo-fijo-valores">
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.item_id", array('options' => $items, 'empty' => 'Seleccione...', 'label' => false, 'div' => false,'class'=>'getCantidad','row'=>$i)); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.egr_cantidad", array('label' => false, 'div' => false, 'type' => 'select', 'empty' => 0,'class'=>'cantidadValida','row'=>$i)); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.egr_detalle", array('type' => 'textarea', 'label' => false, 'div' => false)); ?></td>
			</tr>
			<?php endfor; ?>
		</table>
		<a class="add-row button" href="#" rel="#TablaActivosFijos">Agregar Otro</a>
		<div style="clear:both"></div>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'indexActivosFijos'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
