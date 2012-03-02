<?php echo $this -> Html -> script('usuarios-add'); ?>
<div class="usuarios form">
	<?php echo $this -> Form -> create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Agregar Usuario');?></h2>
		<?php
		echo $this -> Form -> input('usu_nombre_de_usuario', array('label' => 'Nombre De Usuario'));
		echo $this -> Form -> input('usu_contrasena', array('label' => 'Contraseña', 'type' => 'password'));
		echo $this -> Form -> input('usu_contrasena_confirmar', array('label' => 'Confirmar Contraseña', 'type' => 'password'));
		echo $this -> Form -> input('usu_unidad', array('label' => 'Unidad', 'type' => 'select', 'options' => $usu_unidades));
		echo $this -> Form -> input('usu_is_cedula', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('1'=>'Cédula: ','0'=>'Pasaporte: ')));	
		echo $this -> Form -> input('usu_numero_identificacion', array('label' => false,"style"=>"margin-top:5px","class"=>"number"));
		echo $this -> Form -> input('usu_nombres_y_apellidos', array('label' => 'Nombres Y Apellidos'));
		$rolSelected= isset($this->data['Usuario']['rol_id'])&&$this->data['Usuario']['rol_id']?$this->data['Usuario']['rol_id']:2;
		echo $this -> Form -> input('rol_id', array('label' => 'Rol', 'value' =>$rolSelected));
		?>
		<div class="campos-inspector">
			<h2><?php echo __('Area');?></h2>
			<?php
			echo $this -> Form -> input('provincia_id');
			echo $this -> Form -> input('canton_id');
			echo $this -> Form -> input('ciudad_id');
			echo $this -> Form -> input('sector_id');
			echo $this -> Form -> input('usu_inspecciones_por_dia', array('label' => 'Número De Inspecciones Por Día',"class"=>"number",'type'=>'text'));
			?>
		</div>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar button'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function(){
		actualizarGeoUsuario();
	});
</script>