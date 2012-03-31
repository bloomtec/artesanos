<div class="reportes form">
	<?php echo $this -> Form -> create('IngresosDeInventario', array('action'=>'reporteIngresosInventarios'));?>
	<h2><?php echo __('Reporte ingresos de inventarios'); ?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('proveedor', array('type' => 'select', 'label' => 'Proveedores', 'empty' => 'Seleccione...', 'options' => $lstProveedores));
		echo $this -> Form -> input('persona', array('type' => 'select', 'label' => 'Personas', 'empty' => 'Seleccione...', 'options' => $lstPersonas));
		echo $this -> Form -> input('departamento', array('type' => 'select', 'label' => 'Departamentos', 'empty' => 'Seleccione...', 'options' => $lstDepartamentos));
		echo $this -> Form -> input('producto', array('type' => 'select', 'label' => 'Productos', 'empty' => '', 'options' => $lstProductos));
		echo $this -> Form -> input('fecha1', array('type' => 'text', 'label' => 'Fecha inicial', 'class' => 'date'));
		echo $this -> Form -> input('fecha2', array('type' => 'text', 'label' => 'Fecha final', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?> 
	<?php echo $this -> Form -> end();?>
</div>