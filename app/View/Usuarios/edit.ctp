<?php echo $this -> Html -> script('usuarios-edit'); ?>
<div class="usuarios form">
	<?php echo $this -> Form -> create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Modificar Usuario');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('usu_nombre_de_usuario', array('label' => 'Nombre De Usuario'));
		echo $this -> Form -> input('usu_contrasena', array('label' => 'Contraseña', 'type' => 'password', 'value' => ''));
		echo $this -> Form -> input('usu_contrasena_confirmar', array('label' => 'Confirmar Contraseña', 'type' => 'password'));
		echo $this -> Form -> input('usu_unidad', array('label' => 'Unidad', 'type' => 'select', 'options' => $usu_unidades, 'value'=>$this->data['Usuario']['usu_unidad']));
		$selectedCedula = $this->data['Usuario']['usu_is_cedula']?$this->data['Usuario']['usu_is_cedula']:0;
		echo $this -> Form -> input('usu_is_cedula', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('1'=>'Cédula: ','0'=>'Pasaporte: '),'value'=>$selectedCedula));
		echo $this -> Form -> input('usu_numero_identificacion', array('label' => false,"style"=>"margin-top:5px","class"=>"number"));
		echo $this -> Form -> input('usu_activo', array('label' => 'Usuario Activo'));
		echo $this -> Form -> input('usu_nombres_y_apellidos', array('label' => 'Nombres Y Apellidos'));
		echo $this -> Form -> input('rol_id', array('label' => 'Rol'));
		?>
		<div class="campos-inspector">
			<h2><?php echo __('Area');?></h2>
			<?php
			$provincia_id = '';
			if(!empty($this->data['Usuario']['provincia_id'])) $provincia_id = $this->data['Usuario']['provincia_id'];
			$canton_id = '';
			if(!empty($this->data['Usuario']['canton_id'])) $canton_id = $this->data['Usuario']['canton_id'];
			$ciudad_id = '';
			if(!empty($this->data['Usuario']['ciudad_id'])) $ciudad_id = $this->data['Usuario']['ciudad_id'];
			$sector_id = '';
			if(!empty($this->data['Usuario']['sector_id'])) $sector_id = $this->data['Usuario']['sector_id'];
			echo $this -> Form -> input('provincia_id',array('val'=>$this->data['Usuario']['provincia_id']));
			echo $this -> Form -> input('canton_id',array('val'=>$this->data['Usuario']['canton_id']));
			echo $this -> Form -> input('ciudad_id',array('val'=>$ciudad_id));
			echo $this -> Form -> input('sector_id',array('val'=>$sector_id));
			echo $this -> Form -> input('usu_inspecciones_por_dia', array('label' => 'Número De Inspecciones Por Día',"class"=>"number",'type'=>'text'));
			?>
		</div>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar button'));?>
	<?php echo $this -> Form -> end(__('Guardar')); ?>
</div>
<script type="text/javascript">
	$(function(){
		actualizarGeoUsuario();
	});
</script>