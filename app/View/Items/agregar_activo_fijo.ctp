<?php echo $this -> Html -> script('inventarios'); ?>
<div class="items form">
	<?php echo $this -> Form -> create('Item', array('type' => 'file'));?>
	<fieldset>
		<h2><?php echo __('Ingreso De Activos Fijos');?></h2>
		<?php echo $this -> Form -> input('IngresosDeInventario.ing_numero_de_memorandum', array('label' => 'No. Memorandum')); ?>
		<?php echo $this -> Form -> input('IngresosDeInventario.ing_provincia', array('label' => 'Provincia', 'type' => 'select', 'empty' => 'Seleccione...', 'options' => $provincias)); ?>
		<?php echo $this -> Form -> input('IngresosDeInventario.ing_canton', array('label' => 'Canton', 'type' => 'select', 'empty' => 'Seleccione...')); ?>
		<?php echo $this -> Form -> input('IngresosDeInventario.ing_ciudad', array('label' => 'Ciudad', 'type' => 'select', 'empty' => 'Seleccione...')); ?>
		<?php echo $this -> Form -> input('Persona.per_departamento', array('label' => 'Departamento', 'type' => 'select', 'options' => $departamentos)); ?>
		<?php echo $this -> Form -> input('IngresosDeInventario.persona_id', array('empty' => 'Seleccione...', 'class' => 'inv-persona')); ?>
		<?php echo $this -> Form -> input('IngresosDeInventario.proveedor_id', array('empty' => 'Seleccione...')); ?>
		<?php echo $this -> Form -> input('IngresosDeInventario.ing_archivo_soporte', array('type' => 'file', 'label' => 'Documento De Soporte')); ?>
		<table id="TablaActivosFijos" class="activos-fijos inventario" show="5" till="20">
			<tr>
				<th>Activo Fijo</th>
				<th>Cantidad</th>
				<th>Detalle</th>
				<th>Precio Unitario</th>
				<th>Precio Total</th>
			</tr>
			<?php for($i = 1; $i <= 20; $i += 1): ?>
			<tr class="activo-fijo-valores">
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.item_id", array('options' => $items, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.ing_cantidad", array('label' => false, 'div' => false, 'class' => 'number cantidad')); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.ing_detalle", array('type' => 'textarea', 'label' => false, 'div' => false)); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.ing_precio_unitario", array('label' => false, 'div' => false, 'class' => 'valor valorUnitario')); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.ing_precio_total", array('label' => false, 'div' => false, 'class' => 'valor valorTotal')); ?></td>
			</tr>
			<?php endfor; ?>
		</table>
		<a class="add-row button" href="#" rel="#TablaActivosFijos">Agregar Otro</a>
		<div style="clear:both"></div>
		<?php echo $this -> Form -> input('IngresosDeInventario.ing_subtotal', array('label' => 'Sub Total','class'=>'subtotal','disabled'=>true,"type"=>"text")); ?>
		<?php echo $this -> Form -> hidden('IngresosDeInventario.ing_subtotal', array('label' => 'Sub Total','class'=>'subtotal')); ?>
		
		<?php echo $this -> Form -> input('IngresosDeInventario.ing_iva', array('label' => 'I.V.A.','class'=>'iva','disabled'=>true,"type"=>"text")); ?>
		<?php echo $this -> Form -> hidden('IngresosDeInventario.ing_iva', array('label' => 'I.V.A.','class'=>'iva')); ?>
		
		<?php echo $this -> Form -> input('IngresosDeInventario.ing_total', array('label' => 'Total','class'=>'total','disabled'=>true,"type"=>"text")); ?>
		<?php echo $this -> Form -> hidden('IngresosDeInventario.ing_total', array('label' => 'Total','class'=>'total')); ?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'indexActivosFijos'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
