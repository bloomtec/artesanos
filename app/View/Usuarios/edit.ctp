<?php echo $this -> Html -> script('usuarios-edit'); ?>
<div class="usuarios form">
	<?php echo $this -> Form -> create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Modificar Usuario');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('usu_nombre_de_usuario', array('label' => 'Nombre De Usuario'));
		echo $this -> Form -> input('usu_unidad', array('label' => 'Unidad', 'type' => 'select', 'options' => $usu_unidades, 'value'=>$this->data['Usuario']['usu_unidad']));
		echo $this -> Form -> input('usu_cedula', array('label' => 'Cédula'));
		echo $this -> Form -> input('usu_nombres_y_apellidos', array('label' => 'Nombres Y Apellidos'));
		echo $this -> Form -> input('rol_id', array('label' => 'Rol'));
		echo $this -> Form -> input('usu_activo', array('label' => 'Activo'));
		?>
		<div class="campos-inspector">
			<h2><?php echo __('Area');?></h2>
			<?php
			echo $this -> Form -> input('ciudad_id');
			echo $this -> Form -> input('sector_id');
			?>
		</div>
		<div class="permisos-acl">
			<h2><?php echo __('Permisos');?></h2>
			<br />
			<br />
			<?php
			$modulos = $this -> requestAction('/usuarios/getInfoPermisos');
			foreach ($modulos as $key => $modulo) {
				echo '<div class="modulo-' . key($modulo) . '">';
				echo '<p><b>'. key($modulo) .'</b></p>';
				echo '<table class="tabla-permisos"><tr>';
				foreach($modulo[key($modulo)] as $key => $accion) {
					//echo '<td class="accion-permiso" valign="top">';
					echo '<td class="accion-permiso">';
					if($permisos['Permisos'][key($modulo)][$key]) {
						echo $this -> Form -> input('Permisos.'.key($modulo).'.'.$key, array('type'=>'checkbox', 'label'=>$accion, 'checked'=>'checked'));
					} else {
						echo $this -> Form -> input('Permisos.'.key($modulo).'.'.$key, array('type'=>'checkbox', 'label'=>$accion));
					}
					echo '</td>';
				}
				echo '</tr></table>';
				echo '</div>';
			}
			?>
		</div>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>