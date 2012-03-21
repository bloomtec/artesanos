<div class="proveedores form">
	<?php echo $this -> Form -> create('Proveedor');?>
	<fieldset>
		<h2><?php echo __('Agregar Proveedor');?></h2>
		<?php
		echo $this -> Form -> input('pro_rut', array('label' => 'Rut'));
		echo $this -> Form -> input('pro_nombre_razon_social', array('label' => 'Nombre Razon Social'));
		echo $this -> Form -> input('pro_representante_legal', array('label' => 'Representante Legal'));
		echo $this -> Form -> input('pro_telefono_fijo', array('label' => 'Telefono Fijo','class'=>'telefono'));
		echo $this -> Form -> input('pro_celular', array('label' => 'Celular','class'=>'celular'));
		echo $this -> Form -> input('pro_observaciones', array('label' => 'Observaciones'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>