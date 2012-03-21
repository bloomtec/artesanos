<div class="items form">
	<?php echo $this -> Form -> create('Item');?>
		<div class="activo-fijo">
			<fieldset>
				<h2><?php echo __('Agregar Activo Fijo');?></h2>
				<?php echo $this -> Form -> input('Persona.per_departamento', array('label' => 'Departamento', 'type' => 'select', 'empty' => 'Seleccione un departamento...', 'options' => $departamentos)); ?>
				<?php echo $this -> Form -> input('IngresosDeInventario.persona_id', array('empty' => 'Agregar nueva persona...')); ?>
			</fieldset>
		</div>
		<div class="persona">
			<fieldset>
				<h2><?php echo __('Agregar Persona');?></h2>
				<?php echo $this -> Form -> input('Persona.per_nombres', array('label' => 'Nombres')); ?>
				<?php echo $this -> Form -> input('Persona.per_apellidos', array('label' => 'Apellidos')); ?>
				<?php echo $this -> Form -> input('Persona.per_cedula_de_identidad', array('label' => 'Cedula De Identidad')); ?>
			</fieldset>
		</div>
		<div class="item">
			<fieldset>
				<h2><?php echo __('Agregar Ítem');?></h2>
				<?php echo $this -> Form -> input('ite_codigo', array('label' => 'Código')); ?>
				<?php echo $this -> Form -> input('ite_tipo_de_item', array('label' => 'Tipo De Ítem', 'type' => 'select', 'options' => $tiposDeItems)); ?>
				<?php echo $this -> Form -> input('ite_nombre', array('label' => 'Nombre')); ?>
				<?php echo $this -> Form -> input('ite_descripcion', array('label' => 'Descripción')); ?>
				<?php echo $this -> Form -> input('ite_observaciones', array('label' => 'Observaciones')); ?>
			</fieldset>
		</div>	
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'indexActivosFijos'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>