<div class="items form">
	<?php echo $this -> Form -> create('Item', array('type' => 'file'));?>
		<div class="activo-fijo">
			<fieldset>
				<h2><?php echo __('Ingreso De Activos Fijos');?></h2>
				<?php echo $this -> Form -> input('IngresosDeInventario.ing_numero_de_memorandum', array('label' => 'No. Memorandum')); ?>
				<?php echo $this -> Form -> input('Persona.per_departamento', array('label' => 'Departamento', 'type' => 'select', 'empty' => 'Seleccione departamento...', 'options' => $departamentos)); ?>
				<?php echo $this -> Form -> input('IngresosDeInventario.persona_id', array('empty' => 'Seleccione persona...')); ?>
			</fieldset>
		</div>
		<!--<div class="persona">
			<fieldset>
				<h2><?php echo __('Agregar Persona');?></h2>
				<?php echo $this -> Form -> input('Persona.per_nombres', array('label' => 'Nombres')); ?>
				<?php echo $this -> Form -> input('Persona.per_apellidos', array('label' => 'Apellidos')); ?>
				<?php echo $this -> Form -> input('Persona.per_documento_de_identidad', array('label' => 'Documento De Identidad')); ?>
				<?php echo $this -> Form -> input('Persona.per_is_cedula', array('label' => 'Cedula De Ciudadania')); ?>
			</fieldset>
		</div>-->
		<table id="TablaActivosFijos" class="activos-fijos items" show="5" till="20">
			<tr>
				<th>Activo Fijo</th>
				<th>Cantidad</th>
				<th>Detalle</th>
				<th>Precio Unitario</th>
				<th>Precio Total</th>
			</tr>
			<?php for($i = 1; $i <= 20; $i += 1): ?>
			<tr class="activo-fijo-valores">
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.item_id", array('options' => $items, 'empty' => 'Seleccione activo fijo...', 'label' => false, 'div' => false)); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.ing_cantidad", array('label' => false, 'div' => false, 'class' => 'number')); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.ing_detalle", array('type' => 'textarea', 'label' => false, 'div' => false)); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.ing_precio_unitario", array('label' => false, 'div' => false, 'class' => 'valor')); ?></td>
				<td><?php echo $this -> Form -> input("ActivosFijos.$i.ing_precio_total", array('label' => false, 'div' => false, 'class' => 'valor')); ?></td>
			</tr>
			<?php endfor; ?>
		</table>
		<a class="add-row button" href="#" rel="#TablaActivosFijos">Agregar Otro</a>
		<table>
			<tr>
				<th>
					Archivo De Soporte
				</th>
			</tr>
			<tr class="activo-fijo-archivo">
				<td><?php echo $this -> Form -> input('ing_archivo_soporte', array('type' => 'file', 'label' => false, 'div' => false)); ?></td>
			</tr>
		</table>
		<!--<div class="item">
			<fieldset>
				<h2><?php echo __('Agregar Activo Fijo');?></h2>
				<?php echo $this -> Form -> input('ite_codigo', array('label' => 'Código')); ?>
				<?php echo $this -> Form -> input('ite_tipo_de_item', array('label' => 'Tipo De Ítem', 'type' => 'select', 'options' => $tiposDeItems)); ?>
				<?php echo $this -> Form -> input('ite_nombre', array('label' => 'Nombre')); ?>
				<?php echo $this -> Form -> input('ite_descripcion', array('label' => 'Descripción')); ?>
				<?php echo $this -> Form -> input('ite_observaciones', array('label' => 'Observaciones')); ?>
			</fieldset>
		</div>-->
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'indexActivosFijos'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>